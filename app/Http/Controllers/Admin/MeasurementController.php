<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Measurement;

class MeasurementController extends Controller
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
            $measurement = Measurement::where('measurement', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $measurement = Measurement::paginate($perPage);
        }

        return view('admin.measurement.index', compact('measurement'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
   
        //dd($roles);
        return view('admin.measurement.create', compact('products'));
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
           'measurement' => 'required|unique:measurements'
       
        ]); 

         $requestData = $request->all();
        
        Measurement::create($requestData);
     
        return redirect('admin/measurement')->with('message', 'Farmaco Agregado Correctamente!');
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
        $measurement = Measurement::findOrFail($id);

        return view('admin.measurement.show', compact('measurement'));
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
        $measurement = Measurement::findOrFail($id);

        return view('admin.measurement.edit', compact('measurement'));
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
        
        $measurement = Measurement::findOrFail($id);
        $measurement->update($requestData);

        Session::flash('flash_message', 'Measurement updated!');

        return redirect('admin/measurement')->with('message', 'Farmaco Editado Correctamente!');
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
        Measurement::destroy($id);

        Session::flash('flash_message', 'Measurement deleted!');

        return redirect('admin/measurement')->with('message', 'Farmaco Eliminado Correctamente!');
    }
}
