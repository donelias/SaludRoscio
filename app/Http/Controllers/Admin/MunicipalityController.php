<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Municipality;
use App\State;
use Session;

class MunicipalityController extends Controller
{

    public function __construct()
    {
        //$this->middleware('role');
    }
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
            $municipality = Municipality::where('municipality', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $municipality = Municipality::paginate($perPage);
        }

        return view('admin.municipality.index', compact('municipality'));
    }
    
     public function create()
    {

        $states = State::orderBy('id', 'desc')->pluck('state', 'id');
        //dd($states);
        return view('admin.municipality.create', compact('states'));
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
        //dd($request);
        
       $this->validate($request, [
           'municipality' => 'required|max:50|unique:municipalities',
            'state_id' => 'required'
        ]); 
    

                $requestData = $request->all();
        
        Municipality::create($requestData);

        //Session::flash('flash_message', 'Usuario Agregado Correctamente!');
        
        return redirect('admin/municipality')->with('message', 'Municipio Agregado Correctamente!');
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
        $municipality = Municipality::findOrFail($id);

        return view('admin.municipality.show', compact('municipality'));
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
        
        $states = State::orderBy('id', 'desc')->pluck('state', 'id');
        $municipality = Municipality::findOrFail($id);

        return view('admin.municipality.edit', compact('municipality', 'states'));
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
        
        $municipality = Municipality::findOrFail($id);
        $municipality->update($requestData);

        Session::flash('flash_message', 'Municipality updated!');

        return redirect('admin/municipality')->with('message', 'Municipio Editado Correctamente!');
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
        Municipality::destroy($id);

        Session::flash('flash_message', 'Municipality deleted!');

        return redirect('admin/municipality')->with('message', 'Municipio Eliminado Correctamente!');
    }

}