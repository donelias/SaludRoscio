<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\State;
use Illuminate\Http\Request;
use Session;

class StateController extends Controller
{

    public function __construct()
    {
        //$this->middleware('role');
    }/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $state = State::where('state', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $state = State::paginate($perPage);
        }

        return view('admin.state.index', compact('state'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.state.create');
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
     
      $this->validate($request, [
           'state' => 'required|unique:states'
       
        ]); 

         $requestData = $request->all();
        
        State::create($requestData);

        return redirect('admin/state')->with('message', 'Estado Agregado Correctamente!');
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
        $state = State::findOrFail($id);

        return view('admin.state.show', compact('state'));
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
        $state = State::findOrFail($id);

        return view('admin.state.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $state = State::findOrFail($id);
        $state->update($requestData);

        Session::flash('flash_message', 'State updated!');

        return redirect('admin/state')->with('message', 'Estado Editado Correctamente!');
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
        State::destroy($id);

        Session::flash('flash_message', 'State deleted!');

        return redirect('admin/state')->with('message', 'Estado Eliminado Correctamente!');
    }
}
