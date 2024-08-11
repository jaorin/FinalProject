<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Lease;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;
        
        if (!empty($keyword)) {
            $room = Room::where('NumberRoom', 'LIKE', "%$keyword%")
                ->orWhere('Floor', 'LIKE', "%$keyword%")
                ->orWhere('TypeRoomID', 'LIKE', "%$keyword%")
                ->orWhere('RoomStatus', 'LIKE', "%$keyword%")
                ->orWhere('New_Water', 'LIKE', "%$keyword%")
                ->orWhere('New_Electricity', 'LIKE', "%$keyword%")
                ->orWhere('Room_Price', 'LIKE', "%$keyword%")
                ->orWhere('Booking_Price', 'LIKE', "%$keyword%")
                ->orWhere('Deposit_Price', 'LIKE', "%$keyword%")
                ->orWhere('PayStatus', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $room = Room::orderBy('NumberRoom', 'asc')->paginate($perPage); // เรียงลำดับตาม 'NumberRoom' ในลำดับเพิ่มขึ้น
        }
        
        return view('room.index', compact('room'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('room.create');
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
        
        Room::create($requestData);

        return redirect('room')->with('flash_message', 'Room added!');
        
    
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
        $room = Room::findOrFail($id);
        return view('room.show', compact('room'));
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
        $room = Room::findOrFail($id);

        return view('room.edit', compact('room'));
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
        
        $room = Room::findOrFail($id);
        $room->update($requestData);

        return redirect('room')->with('flash_message', 'Room updated!');
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
        Room::destroy($id);

        return redirect('room')->with('flash_message', 'Room deleted!');
    }


}