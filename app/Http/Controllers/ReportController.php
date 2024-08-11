<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Lease;
use App\Models\Room;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;



class ReportController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;
    
        if (!empty($keyword)) {
            $invoices = Invoice::where('DateInvoices', 'LIKE', "%$keyword%")
                ->orWhere('Date_Pay', 'LIKE', "%$keyword%")
                ->orWhere('Pay_Date', 'LIKE', "%$keyword%")
                ->orWhere('Delay_Date', 'LIKE', "%$keyword%")
                ->orWhere('Water_Old', 'LIKE', "%$keyword%")
                ->orWhere('Water_New', 'LIKE', "%$keyword%")
                ->orWhere('Water_Unit', 'LIKE', "%$keyword%")
                ->orWhere('Water_Perunit', 'LIKE', "%$keyword%")
                ->orWhere('Water_Total', 'LIKE', "%$keyword%")
                ->orWhere('Electricity_Old', 'LIKE', "%$keyword%")
                ->orWhere('Electricity_New', 'LIKE', "%$keyword%")
                ->orWhere('Electricity_Unit', 'LIKE', "%$keyword%")
                ->orWhere('Electricity_Perunit', 'LIKE', "%$keyword%")
                ->orWhere('Electricity_Total', 'LIKE', "%$keyword%")
                ->orWhere('Room_Price', 'LIKE', "%$keyword%")
                ->orWhere('Net_Pay', 'LIKE', "%$keyword%")
                ->orWhere('LeaseID', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $invoices = Invoice::latest()->paginate($perPage);
        }

        return view('report.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
     
        $leases = Lease::all(); // ดึงข้อมูลใบสัญญาเช่าทั้งหมด
        $rooms = Room::all();
        $invoices = Invoice::all();
    
        return view('report.create', compact('leases','rooms','invoices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Invoice::create($requestData);

    // รับข้อมูลจากแบบฟอร์ม invoice
    $waterNew = $request->input('Water_New');
    $electricityNew = $request->input('Electricity_New');
    $numberRoom = $request->input('NumberRoom');
    // ค้นหา RoomID จากตาราง lease โดยใช้ Lease_Doc
    $room = Room::where('NumberRoom', $numberRoom)->first();

    // คัดลอกค่าจาก invoice ไปยัง room สำหรับห้องที่พบ
    if ($room) {
        // สร้าง Invoice และบันทึกข้อมูล
      

        // อัปเดตค่า Water_New และ Electricity_New ในตาราง Room
        $room->update([
            'New_Water' => $waterNew,
            'New_Electricity' => $electricityNew,
        ]);

        // ส่งผู้ใช้กลับไปยังหน้าอื่นหลังจากการบันทึก
        return redirect('report')->with('flash_message', 'Invoice and Room updated!');
    } else {
        // หากหมายเลขห้องไม่เจอ
        return redirect('report')->with('error_message', 'Room not found. Please check the NumberRoom.');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        $rooms = Room::all();
        return view('report.show', compact('invoice','rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $leases = Lease::getAll();
        $rooms = Room::all();
        return view('report.edit', compact('invoice','leases','rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $invoice = Invoice::findOrFail($id);
        $invoice->update($requestData);

        return redirect('report')->with('flash_message', 'Invoice updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Invoice::destroy($id);

        return redirect('report')->with('flash_message', 'Invoice deleted!');
    }

    public function report1(Request $request)
    {
        $perPage = 10;
        $leases = Lease::all(); // ดึงข้อมูลใบสัญญาเช่าทั้งหมด
        $rooms = Room::all();
        $invoices = Invoice::all();
        $method = $request->method();    
        if ($request->isMethod('post'))
        {   
            $from = $request->input('from');
            $to = $request->input('to');
            
            if ($request->has('search'))
                {
                    $search =
                    DB::table('Invoices')
                    ->join('Leases','Invoices.LeaseID','=','Leases.id')
                    ->join('Rooms','Leases.RoomID','=','Rooms.id')

                    ->whereBetween('Invoices.DateInvoices',[$from . ' 00:00:00', $to . ' 23:59:59'])
                    ->select('Leases.*','Invoices.*','Rooms.*')
                    ->get();

                    $pdf = Pdf::loadView('report1PDF',['report1' => $search], compact('from','to'));
                    return @$pdf->stream();
                }
                else {
                    $search =
                    DB::table('Invoices')
                    ->join('Leases','Invoices.LeaseID','=','Leases.id')   
                    ->join('Rooms','Leases.RoomID','=','Rooms.id')           
                    ->select('Leases.*','Invoices.*','Rooms.*')
                    ->get();

                    $pdf = Pdf::loadView('report1PDF',['report1' => $search]);
                    return @$pdf->stream();
                   }
                
        }
        else {
                 $invoices = Invoice::orderBy('id', 'asc')->paginate($perPage);
                }

        return view('report1', compact('invoices','leases','rooms'));
    }

    public function reportRoom(Request $request)
{
    $perPage = 10;
    $leases = Lease::all(); // ดึงข้อมูลใบสัญญาเช่าทั้งหมด
        $rooms = Room::all();
        $invoices = Invoice::all();
    $method = $request->method();
    
    if ($request->isMethod('post')) {
        $from = $request->input('from');
        $to = $request->input('to');
        $roomStatus = $request->input('RoomStatus'); 

        $search = $this->searchRoomData($request, $roomStatus, $perPage);

        $pdf = Pdf::loadView('reportRoomPDF', ['reportRoom' => $search], compact('from', 'to', 'roomStatus'));
        return $pdf->stream();
    } else {
        $rooms = Room::orderBy('NumberRoom', 'asc')->paginate($perPage);
    }

    return view('reportRoom', compact('rooms'));
}

private function searchRoomData($request, $roomStatus, $perPage)
{
    $perPage = 50;
    $query = Room::orderBy('id', 'asc');

    if ($request->has('search') && $roomStatus) {
        $query->where('RoomStatus', $roomStatus);
    }else {
        $rooms = Room::orderBy('NumberRoom', 'asc')->paginate($perPage);
    }
    
    return $query->paginate($perPage);
}

public function reportUser(Request $request)
{
    $perPage = 10;
    $method = $request->method();
    
    if ($request->isMethod('post')) {
        $from = $request->input('from');
        $to = $request->input('to');
        $user = $request->input('user'); 

        $search = $this->searchUserData($user, $perPage);

        $pdf = PDF::loadView('reportUserPDF', ['reportUser' => $search, 'from' => $from, 'to' => $to, 'user' => $user]);
        return $pdf->stream();
    } else {
        $users = User::orderBy('id', 'asc')->paginate($perPage);
    }

    return view('reportUser', compact('users'));
}

private function searchUserData($user, $perPage)
{
    $perPage = 250;
    $query = User::orderBy('id', 'asc');

    if ($user) {
        $query->where('name', 'LIKE', '%' . $user . '%');
    }else {
        $users = User::orderBy('id', 'asc')->paginate($perPage);
    }
    
    return $query->paginate($perPage);
}


}