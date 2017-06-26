<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Drug;
use App\Product;
use Session;

class DrugController extends Controller
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
            $drug = Drug::where('drug', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $drug = Drug::paginate($perPage);
        }

        return view('admin.drug.index', compact('drug'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
   
        //dd($roles);
        return view('admin.drug.create', compact('products'));
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
           'drug' => 'required|unique:drugs'
       
        ]); 

         $requestData = $request->all();
        
        Drug::create($requestData);

     
        return redirect('admin/drug')->with('message', 'Farmaco Agregado Correctamente!');
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
        $drug = Drug::findOrFail($id);

        return view('admin.drug.show', compact('drug'));
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
        $drug = Drug::findOrFail($id);

        return view('admin.drug.edit', compact('drug'));
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
        
        $drug = Drug::findOrFail($id);
        $drug->update($requestData);

        Session::flash('flash_message', 'Drug updated!');

        return redirect('admin/drug')->with('message', 'Farmaco Editado Correctamente!');
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
        Drug::destroy($id);

        Session::flash('flash_message', 'Drug deleted!');

        return redirect('admin/drug')->with('message', 'Farmaco Eliminado Correctamente!');
    }
}
