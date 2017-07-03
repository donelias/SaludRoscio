<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Typemedicine;
use App\Product;
use Session;
 
class TypemedicineController extends Controller
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
            $typemedicine = Typemedicine::where('typemedicine', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $typemedicine = Typemedicine::paginate($perPage);
        }

        return view('admin.typemedicine.index', compact('typemedicine'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        //dd($roles);
        return view('admin.typemedicine.create');
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
           'typemedicine' => 'required|unique:typemedicines'
       
        ]); 

         $requestData = $request->all();
        
        Typemedicine::create($requestData);
     
        return redirect('admin/typemedicine')->with('message', 'Tipo de Medicamento Agregada Correctamente!');
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
        $typemedicine = Typemedicine::findOrFail($id);

        return view('admin.typemedicine.show', compact('typemedicine'));
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
        $typemedicine = Typemedicine::findOrFail($id);

        return view('admin.typemedicine.edit', compact('typemedicine'));
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
        
        $typemedicine = Typemedicine::findOrFail($id);
        $typemedicine->update($requestData);

        Session::flash('flash_message', 'Typemedicine updated!');

        return redirect('admin/typemedicine')->with('message', 'Tipo de Medicamento Editada Correctamente!');
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
        Typemedicine::destroy($id);

        Session::flash('flash_message', 'Typemedicine deleted!');

        return redirect('admin/typemedicine')->with('message', 'Tipo de Medicamento Eliminada Correctamente!');
    }
}
