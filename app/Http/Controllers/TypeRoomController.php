<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\TypeRoom;
use Illuminate\Http\Request;

class TypeRoomController extends Controller
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
            $typeroom = TypeRoom::where('TypeRoomID', 'LIKE', "%$keyword%")
                ->orWhere('Price', 'LIKE', "%$keyword%")
                ->orWhere('Booking', 'LIKE', "%$keyword%")
                ->orWhere('DepositBooking', 'LIKE', "%$keyword%")
                ->orWhere('Water', 'LIKE', "%$keyword%")
                ->orWhere('Electricity', 'LIKE', "%$keyword%")
                ->orWhere('Deposit', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $typeroom = TypeRoom::latest()->paginate($perPage);
        }

        return view('type-room.index', compact('typeroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('type-room.create');
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
                if ($request->hasFile('PhotoTypeRoom')) {
            $requestData['PhotoTypeRoom'] = $request->file('PhotoTypeRoom')
                ->store('uploads', 'public');
        }

        TypeRoom::create($requestData);

        return redirect('type-room')->with('flash_message', 'TypeRoom added!');
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
        $typeroom = TypeRoom::findOrFail($id);

        return view('type-room.show', compact('typeroom'));
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
        $typeroom = TypeRoom::findOrFail($id);

        return view('type-room.edit', compact('typeroom'));
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
                if ($request->hasFile('PhotoTypeRoom')) {
            $requestData['PhotoTypeRoom'] = $request->file('PhotoTypeRoom')
                ->store('uploads', 'public');
        }

        $typeroom = TypeRoom::findOrFail($id);
        $typeroom->update($requestData);

        return redirect('type-room')->with('flash_message', 'TypeRoom updated!');
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
        TypeRoom::destroy($id);

        return redirect('type-room')->with('flash_message', 'TypeRoom deleted!');
    }
}
