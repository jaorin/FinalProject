<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Upload;
use App\Models\Lease;
use App\Models\User;
use App\Models\Room;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 4;

        if (!empty($keyword)) {
            $upload = Upload::where('Photo', 'LIKE', "%$keyword%")
                ->orWhere('DateUpload', 'LIKE', "%$keyword%")
                ->orWhere('NumberRoom', 'LIKE', "%$keyword%")
                ->orWhere('LeaseID', 'LIKE', "%$keyword%")
                ->orWhere('Usersid', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $upload = Upload::orderBy('id', 'desc')->paginate($perPage);
        }

        return view('upload.index', compact('upload'));
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

        return view('upload.create', compact('users','lease'));
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
                if ($request->hasFile('Photo')) {
            $requestData['Photo'] = $request->file('Photo')
                ->store('uploads', 'public');
        }

        Upload::create($requestData);

        return redirect('userUploads')->with('flash_message', 'Upload added!');
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

        $upload = Upload::findOrFail($id);
        $loggedInUserId = auth()->user()->id;
    
        // ดึงข้อมูล Lease ID ที่เกี่ยวข้องกับผู้ที่ทำการเข้าสู่ระบบ
        $lease = Lease::where('Usersid', $loggedInUserId)->latest()->first();
        $rooms = Room::getAll();
        
        return view('upload.show', compact('upload','lease','rooms'));
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
        $upload = Upload::findOrFail($id);
        $loggedInUserId = auth()->user()->id;
        // ดึงข้อมูล Lease ID ที่เกี่ยวข้องกับผู้ที่ทำการเข้าสู่ระบบ
        $lease = Lease::where('Usersid', $loggedInUserId)->latest()->first();
        $rooms = Room::getAll(); 

        return view('upload.edit', compact('upload','lease','rooms'));
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
                if ($request->hasFile('Photo')) {
            $requestData['Photo'] = $request->file('Photo')
                ->store( 'public' ,'uploads' );
        }

        $upload = Upload::findOrFail($id);
        $upload->update($requestData);

        return redirect('upload')->with('flash_message', 'Upload updated!');
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
        Upload::destroy($id);

        return redirect('upload')->with('flash_message', 'Upload deleted!');
    }

    public function userUploads(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;
        $user = Auth::user();
    
        if (!empty($keyword)) {
            $upload = Upload::where('Usersid', $user->id)
                ->where(function ($query) use ($keyword) {
                    $query->where('Photo', 'LIKE', "%$keyword%")
                        ->orWhere('DateUpload', 'LIKE', "%$keyword%")
                        ->orWhere('NumberRoom', 'LIKE', "%$keyword%")
                        ->orWhere('LeaseID', 'LIKE', "%$keyword%");
                })
                ->latest()
                ->paginate($perPage);
        } else {
            $upload = Upload::where('Usersid', $user->id)
                ->latest()
                ->paginate($perPage);
        }
    
        return view('upload.index', compact('upload'));
    }

}
