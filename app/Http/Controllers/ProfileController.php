<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\User;
use App\Models\role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;



class ProfileController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    

    public function index(Request $request)
    {
        $keyword = $request->get('search');    
        $perPage = 10;
        if (!empty($keyword)) {
            $user = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('age', 'LIKE', "%$keyword%")
                ->orWhere('gender', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('role_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $user = User::orderBy('id', 'asc')->paginate($perPage);
        }


        return view('profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        return view('profile.create');
        
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
                    if ($request->hasFile('Photouser')) {
            $requestData['Photouser'] = $request->file('Photouser')
                ->store('uploads', 'public');
        }

   
        user::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'age' => $request['age'],
            'role_id' => $request['role_id'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']), 
        ]);

        return redirect('profile')->with('flash_message', 'user added!');
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
        $user = User::findOrFail($id);

        return view('profile.show', compact('user'));
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
        $user = User::findOrFail($id);

        return view('profile.edit', compact('user'));
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
                if ($request->hasFile('Photouser')) {
            $requestData['Photouser'] = $request->file('Photouser')
                ->store('uploads', 'public');
        }

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'age' => $request['age'],
            'role_id' => $request['role_id'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
        ]);

        return redirect('profile')->with('flash_message', 'user updated!');
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
        User::destroy($id);

        return redirect('profile')->with('flash_message', 'user deleted!');
    }

    public function myprofile()
    {
        $user =Auth::user();
        return view('profile.show', compact('user'));
    }
    

}
