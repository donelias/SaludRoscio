<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\People;
use App\Typeperson; 
use App\Address; 
use App\Sector; 
use App\Typeidentificationcard; 
use App\Classificationperson; 
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Session;

class PeopleController extends Controller
{

    public function __construct()
    {
        //$this->middleware('role');
    }
    /* @return \Illuminate\View\View
     */
       public function index($id)
    {
        if ($id == 1){
            $classificationperson = " Proveedores";
        }
        elseif($id == 3)
        {
            $classificationperson = "Paciente";
        }
        elseif($id == 4)
        {
            $classificationperson = "Empleados";
        }
        elseif($id == 5)
        {
            $classificationperson = "Ambulatorios";
        }

        $perPage = 25;
        $people = People::where('classificationperson_id', 'LIKE', $id)
            //->orWhere('identificationcard', 'LIKE', "%$keyword%")
            ->paginate($perPage);

        return view('admin.people.index', compact('people', 'classificationperson'));



        /*$keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $people = People::where('name', 'LIKE', "%$keyword%")
                    ->orWhere('identificationcard', 'LIKE', "%$keyword%")
                    
                ->paginate($perPage);
        } else { 

            $people = People::paginate($perPage);
        }

        return view('admin.people.index', compact('people'));*/
    }

    public function people(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;
        $classificationperson = "General de Personas";

        if (!empty($keyword)) {
            $people = People::where('name', 'LIKE', "%$keyword%")
                    ->orWhere('identificationcard', 'LIKE', "%$keyword%")

                ->paginate($perPage);
        } else {

            $people = People::paginate($perPage);
        }

        return view('admin.people.index', compact('people', 'classificationperson'));
    }
    
     public function create()
    {
         $typepersons = Typeperson::orderBy('id', 'desc')->pluck('typeperson', 'id');

         $sectors = Sector::orderBy('id', 'desc')->pluck('sector', 'id');

         $typeidentificationcards = Typeidentificationcard::orderBy('id', 'desc')->pluck('typeidentificationcard', 'id');

         $classificationpersons = Classificationperson::orderBy('id', 'desc')->pluck('classificationperson', 'id');

        $classificationperson = "Crear Persona";

        return view('admin.people.create', compact('typepersons', 'sectors', 'typeidentificationcards', 'classificationpersons', 'classificationperson'));
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
            'name' => 'required|max:250',
            'identificationcard' => 'required|unique:peoples',
            'phone' => 'required|max:11',
            'typeperson_id' => 'required',
            'typeidentificationcard_id' => 'required',
            'classificationperson_id' => 'required'
             
        ]);
        
       $people = People::create([
            'name' => $request->get('name'),
            'identificationcard' => $request->get('identificationcard'),
            'phone' => $request->get('phone'),
            'typeperson_id' => $request->get('typeperson_id'),
            'typeidentificationcard_id' => $request->get('typeidentificationcard_id'),
            'classificationperson_id' => $request->get('classificationperson_id')
            
            
        ]);

      $people_id= $people->id;

      $this->validate($request, [
            
            'street' => 'required|max:25',
            'N°_house' => 'required|max:6',
            'sector_id' => 'required'
        ]); 

      Address::create([
                'street' => $request->get('street'),
                'N°_house' => $request->get('N°_house'),
                'sector_id' => $request->get('sector_id'),
                'people_id' => $people_id
                
            ]);
        
        //Session::flash('flash_message', 'people added!');

        //Session::flash('flash_message', 'Usuario Agregado Correctamente!');
        
     return redirect('admin/people')->with('message', 'Persona Agregada Correctamente!');
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

        $people = People::findOrFail($id);

        return view('admin.people.show', compact('people', 'classificationperson'));
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
        
        $typepersons = Typeperson::orderBy('id', 'desc')->pluck('typeperson', 'id');

         $sectors = Sector::orderBy('id', 'desc')->pluck('sector', 'id');

         $typeidentificationcards = Typeidentificationcard::orderBy('id', 'desc')->pluck('typeidentificationcard', 'id');

         $classificationpersons = Classificationperson::orderBy('id', 'desc')->pluck('classificationperson', 'id');

        $classificationperson = "Editar Persona";
        $people = People::findOrFail($id);
         
        return view('admin.people.edit', compact('people','typepersons', 'sectors', 'typeidentificationcards', 'classificationpersons', 'classificationperson'));
    
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
        
        $people = People::findOrFail($id);
        $people->update($requestData);
    
    //    Session::flash('flash_message', 'People updated!');

        return redirect('admin/people')->with('message', 'Persona Editada Correctamente!');
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
        People::destroy($id);

        Session::flash('flash_message', 'People deleted!');

        return redirect('admin/people')->with('message', 'Persona Eliminada Correctamente!');
    }
}
