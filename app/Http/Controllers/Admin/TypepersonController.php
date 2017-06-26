<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Typeperson;
use App\People;
use Illuminate\Http\Request;
use Session;
 
class typepersonController extends Controller
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
            $typeperson = Typeperson::where('typeperson', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $typeperson = Typeperson::paginate($perPage);
        }

        return view('admin.typeperson.index', compact('typeperson'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
         
        return view('admin.typeperson.create'); 
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
           'typeperson' => 'required|unique:typepersons'
       
        ]); 

         $requestData = $request->all();
        
        Typeperson::create($requestData);


        return redirect('admin/typeperson')->with('message', 'tipo de persona Agregado Correctamente!');
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
        $typeperson = Typeperson::findOrFail($id);

        return view('admin.typeperson.show', compact('typeperson'));
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
        $typeperson = Typeperson::findOrFail($id);

        return view('admin.typeperson.edit', compact('typeperson'));
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
        
        $typeperson = Typeperson::findOrFail($id);
        $typeperson->update($requestData);

        Session::flash('flash_message', 'Typeperson updated!');

        return redirect('admin/typeperson')->with('message', 'Tipo de Persona Editada Correctamente!');
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
        Typeperson::destroy($id);

        Session::flash('flash_message', 'Typeperson deleted!');

        return redirect('admin/typeperson')->with('message', 'tipo de persona Eliminado Correctamente!');
    }
}
