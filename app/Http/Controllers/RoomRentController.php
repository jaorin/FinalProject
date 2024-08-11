<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\RoomRent;
use Illuminate\Http\Request;

class RoomRentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $roomrent = RoomRent::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('room_id', 'LIKE', "%$keyword%")
                ->orWhere('end_rent', 'LIKE', "%$keyword%")
                ->orWhere('rent_note', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $roomrent = RoomRent::latest()->paginate($perPage);
        }

        return view('room-rent.index', compact('roomrent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('room-rent.create');
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
        
        RoomRent::create($requestData);

        return redirect('room-rent')->with('flash_message', 'RoomRent added!');
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
        $roomrent = RoomRent::findOrFail($id);

        return view('room-rent.show', compact('roomrent'));
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
        $roomrent = RoomRent::findOrFail($id);

        return view('room-rent.edit', compact('roomrent'));
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
        
        $roomrent = RoomRent::findOrFail($id);
        $roomrent->update($requestData);

        return redirect('room-rent')->with('flash_message', 'RoomRent updated!');
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
        RoomRent::destroy($id);

        return redirect('room-rent')->with('flash_message', 'RoomRent deleted!');
    }
}
