<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Dormitory;
use Illuminate\Http\Request;

class DormitoryController extends Controller
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
            $dormitory = Dormitory::where('Namedormi', 'LIKE', "%$keyword%")
                ->orWhere('Address', 'LIKE', "%$keyword%")
                ->orWhere('Phone', 'LIKE', "%$keyword%")
                ->orWhere('Bankaccount', 'LIKE', "%$keyword%")
                ->orWhere('GenLogobankder', 'LIKE', "%$keyword%")
                ->orWhere('Photo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $dormitory = Dormitory::latest()->paginate($perPage);
        }

        return view('dormitory.index', compact('dormitory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dormitory.create');
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
                if ($request->hasFile('GenLogobankder')) {
            $requestData['GenLogobankder'] = $request->file('GenLogobankder')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('Photo')) {
            $requestData['Photo'] = $request->file('Photo')
                ->store('uploads', 'public');
        }

        Dormitory::create($requestData);

        return redirect('dormitory')->with('flash_message', 'Dormitory added!');
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
        $dormitory = Dormitory::findOrFail($id);

        return view('dormitory.show', compact('dormitory'));
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
        $dormitory = Dormitory::findOrFail($id);

        return view('dormitory.edit', compact('dormitory'));
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
                if ($request->hasFile('GenLogobankder')) {
            $requestData['GenLogobankder'] = $request->file('GenLogobankder')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('Photo')) {
            $requestData['Photo'] = $request->file('Photo')
                ->store('uploads', 'public');
        }

        $dormitory = Dormitory::findOrFail($id);
        $dormitory->update($requestData);

        return redirect('dormitory')->with('flash_message', 'Dormitory updated!');
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
        Dormitory::destroy($id);

        return redirect('dormitory')->with('flash_message', 'Dormitory deleted!');
    }
}
