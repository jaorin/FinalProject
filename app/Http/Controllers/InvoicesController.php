<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Lease;
use App\Models\Room;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InvoicesController extends Controller
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
                ->orWhere('Delay_Price', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $invoices = Invoice::orderBy('id', 'desc')->paginate($perPage);
        }

        return view('invoices.index', compact('invoices'));
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
    
        return view('invoices.create', compact('leases','rooms','invoices'));
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
        return redirect('invoices')->with('flash_message', 'Invoice and Room updated!');
    } else {
        // หากหมายเลขห้องไม่เจอ
        return redirect('invoices')->with('error_message', 'Room not found. Please check the NumberRoom.');
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
        return view('invoices.show', compact('invoice','rooms'));
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
        return view('invoices.edit', compact('invoice','leases','rooms'));
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

        return redirect('invoices')->with('flash_message', 'Invoice updated!');
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

        return redirect('invoices')->with('flash_message', 'Invoice deleted!');
    }

    

    
}