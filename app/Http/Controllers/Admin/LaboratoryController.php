<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Laboratory;
use App\Product;
use Session;

class LaboratoryController extends Controller
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
            $laboratory = Laboratory::where('laboratory', 'LIKE', "%$keyword%")
                
                ->paginate($perPage);
        } else {
            $laboratory = Laboratory::paginate($perPage);
        }

        return view('admin.laboratory.index', compact('laboratory'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
   
        //dd($roles);
        return view('admin.laboratory.create', compact('products'));
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
           'laboratory' => 'required|unique:laboratories'
       
        ]); 

         $requestData = $request->all();
        
        Laboratory::create($requestData);

     
        return redirect('admin/laboratory')->with('message', 'Laboratorio Agregado Correctamente!');
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
        $laboratory = Laboratory::findOrFail($id);

        return view('admin.laboratory.show', compact('laboratory'));
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
        $laboratory = Laboratory::findOrFail($id);

        return view('admin.laboratory.edit', compact('laboratory'));
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
        
        $laboratory = Laboratory::findOrFail($id);
        $laboratory->update($requestData);

        Session::flash('flash_message', 'Laboratory updated!');

        return redirect('admin/laboratory')->with('message', 'Laboratorio Editado Correctamente!');
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
        Laboratory::destroy($id);

        return redirect('admin/laboratory')->with('message', 'Laboratorio Eliminado Correctamente!');
    }
}
