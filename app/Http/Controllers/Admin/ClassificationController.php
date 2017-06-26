<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Classification;
use App\Product;
use Session;


class ClassificationController extends Controller
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
            $classification = Classification::where('classification', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $classification = Classification::paginate($perPage);
        }

        return view('admin.classification.index', compact('classification'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        //dd($roles);
        return view('admin.classification.create', compact('products'));
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
           'classification' => 'required|unique:classifications'
       
        ]); 

         $requestData = $request->all();
        
        Classification::create($requestData);
     
        return redirect('admin/classification')->with('message', 'Clasificacion Agregada Correctamente!');
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
        $classification = Classification::findOrFail($id);

        return view('admin.classification.show', compact('classification'));
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
        $classification = Classification::findOrFail($id);

        return view('admin.classification.edit', compact('classification'));
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
        
        $classification = Classification::findOrFail($id);
        $classification->update($requestData);

        Session::flash('flash_message', 'Classification updated!');

        return redirect('admin/classification')->with('message', 'Clasificacion Editada Correctamente!');
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
        Classification::destroy($id);

        Session::flash('flash_message', 'Classification deleted!');

        return redirect('admin/classification')->with('message', 'Clasificacion Eliminada Correctamente!');
    }
}
