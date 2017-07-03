<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classificationperson;
use Session;

class ClassificationpersonController extends Controller
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
            $classificationperson = Classificationperson::where('classificationperson', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $classificationperson = Classificationperson::paginate($perPage);
        }

        return view('admin.classificationperson.index', compact('classificationperson'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
   
        //dd($roles);
        return view('admin.classificationperson.create', compact('peoples'));
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
           'classificationperson' => 'required|unique:classificationpersons'
       
        ]); 

         $requestData = $request->all();
        
        Classificationperson::create($requestData);

     
        return redirect('admin/classificationperson')->with('message', 'Clasificacion de persona Agregado Correctamente!');
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
        $classificationperson = Classificationperson::findOrFail($id);

        return view('admin.classificationperson.show', compact('classificationperson'));
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
        $classificationperson = Classificationperson::findOrFail($id);

        return view('admin.classificationperson.edit', compact('classificationperson'));
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
        
        $classificationperson = Classificationperson::findOrFail($id);
        $classificationperson->update($requestData);

     //   Session::flash('flash_message', 'classificationperson updated!');

        return redirect('admin/classificationperson')->with('message', 'Clasificacion de persona Editado Correctamente!');
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
        Classificationperson::destroy($id);

        //Session::flash('flash_message', 'classificationperson deleted!');

        return redirect('admin/classificationperson')->with('message', 'Clasificacion de persona Eliminado Correctamente!');
    }
}
