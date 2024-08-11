<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Room;
use App\Models\User;
use App\Models\TypeRoom;
use App\Models\Invoice;

use App\Models\Lease;
use Illuminate\Http\Request;

class LeaseController extends Controller
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
            $lease = Lease::where('RoomID', 'LIKE', "%$keyword%")
                ->orWhere('Usersid', 'LIKE', "%$keyword%")
                ->orWhere('Idcard', 'LIKE', "%$keyword%")
                ->orWhere('DateLease', 'LIKE', "%$keyword%")
                ->orWhere('Vehicle', 'LIKE', "%$keyword%")
                ->orWhere('Carregistration', 'LIKE', "%$keyword%")
                ->orWhere('Roomer', 'LIKE', "%$keyword%")
                ->orWhere('KeyCard', 'LIKE', "%$keyword%")
                ->orWhere('KeyPrice', 'LIKE', "%$keyword%")
                ->orWhere('Room_Price', 'LIKE', "%$keyword%")
                ->orWhere('Booking_Price', 'LIKE', "%$keyword%")
                ->orWhere('Deposit_Price', 'LIKE', "%$keyword%")
                ->orWhere('Net_Pay', 'LIKE', "%$keyword%")
                ->orWhere('Meter_Water', 'LIKE', "%$keyword%")
                ->orWhere('Meter_Electricity', 'LIKE', "%$keyword%")
                ->orWhere('Status_Lease', 'LIKE', "%$keyword%")
                ->orWhere('PaymentStatus', 'LIKE', "%$keyword%")
                ->orWhere('Booking_Slip', 'LIKE', "%$keyword%")
                ->orWhere('Idcard_Doc', 'LIKE', "%$keyword%")
                ->orWhere('Lease_Doc', 'LIKE', "%$keyword%")
                ->orWhere('Checkout', 'LIKE', "%$keyword%")
                ->orWhere('LeaseTotal', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $lease = Lease::orderBy('Lease_Doc', 'desc')->paginate($perPage);

        } 

        return view('lease.index', compact('lease'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
       
        $leasemaxid = lease:: max('Lease_Doc')+1;

        $rooms = Room::getAll();    
        
        $users = User::getAll();
    
        $typeRooms = TypeRoom::getAll();
        return view('lease.create', compact('typeRooms','rooms','leasemaxid','users'));
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
        
        Lease::create($requestData);

        return redirect('lease')->with('flash_message', 'Lease added!');
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
        $lease = Lease::findOrFail($id);
                  
        return view('lease.show', compact('lease'));
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
        $lease = Lease::findOrFail($id);
        $rooms = Room::getAll();
        $users = User::getAll();
        $typeRooms = TypeRoom::getAll();
        $leasemaxid = lease:: max('Lease_Doc')+1; 

        return view('lease.edit', compact('lease','rooms','typeRooms','leasemaxid','users'));
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
        
        $lease = Lease::findOrFail($id);
        $lease->update($requestData);

        return redirect('lease')->with('flash_message', 'Lease updated!');
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
        Lease::destroy($id);

        return redirect('lease')->with('flash_message', 'Lease deleted!');
    }
}
