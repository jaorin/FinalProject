<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Checkout;
use App\Models\Lease;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;

class CheckoutController extends Controller
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
            $checkout = Checkout::where('Datetoday', 'LIKE', "%$keyword%")
                ->orWhere('DateCheckout', 'LIKE', "%$keyword%")
                ->orWhere('LeaseID', 'LIKE', "%$keyword%")
                ->orWhere('Usersid', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $checkout = Checkout::orderBy('id', 'asc')->paginate($perPage);
        }

        return view('checkout.index', compact('checkout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $users = User::getAll();
        // ดึงข้อมูลผู้ที่ทำการเข้าสู่ระบบ
        $loggedInUserId = auth()->user()->id;
    
        // ดึงข้อมูล Lease ID ที่เกี่ยวข้องกับผู้ที่ทำการเข้าสู่ระบบ
        $lease = Lease::where('Usersid', $loggedInUserId)->latest()->first();

        return view('checkout.create', compact('users','lease'));
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
        
        Checkout::create($requestData);

        return redirect('checkout')->with('flash_message', 'Checkout added!');
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

        $checkout = Checkout::findOrFail($id);
        $loggedInUserId = auth()->user()->id;
    
        // ดึงข้อมูล Lease ID ที่เกี่ยวข้องกับผู้ที่ทำการเข้าสู่ระบบ
        $lease = Lease::where('Usersid', $loggedInUserId)->latest()->first();
        $rooms = Room::getAll();
        return view('checkout.show', compact('checkout','lease','rooms'));
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
        $checkout = Checkout::findOrFail($id);
        $loggedInUserId = auth()->user()->id;
        // ดึงข้อมูล Lease ID ที่เกี่ยวข้องกับผู้ที่ทำการเข้าสู่ระบบ
        $lease = Lease::where('Usersid', $loggedInUserId)->latest()->first();
        $rooms = Room::getAll(); 

        return view('checkout.edit', compact('checkout','lease','rooms'));
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
        
        $checkout = Checkout::findOrFail($id);
        $checkout->update($requestData);

        return redirect('checkout')->with('flash_message', 'Checkout updated!');
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
        Checkout::destroy($id);

        return redirect('checkout')->with('flash_message', 'Checkout deleted!');
    }

    

}