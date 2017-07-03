<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Parish;
use App\Municipality;
use Illuminate\Http\Request;
use Session;

class ParishController extends Controller
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
            $parish = Parish::where('parish', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $parish = Parish::paginate($perPage);
        }

        return view('admin.parish.index', compact('parish'));
    }
    
     public function create()
    {
        $municipalities = Municipality::orderBy('id', 'desc')->pluck('municipality', 'id');
       // dd($municipalities);
        return view('admin.parish.create', compact('municipalities'));
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
           'parish' => 'required|max:50|unique:parishes',
            'municipality_id' => 'required'
        ]); 
    

                $requestData = $request->all();
        
        Parish::create($requestData);
        
        return redirect('admin/parish')->with('message', 'Parroquia Agregada Correctamente!');
        //dd($request);
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
        $parish = Parish::findOrFail($id);

        return view('admin.parish.show', compact('parish'));
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
         $municipalities = Municipality::orderBy('id', 'desc')->pluck('municipality', 'id');
        $parish = Parish::findOrFail($id);

        return view('admin.parish.edit', compact('parish', 'municipalities'));
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
        
        $parish = Parish::findOrFail($id);
        $parish->update($requestData);

        Session::flash('flash_message', 'Parish updated!');

        return redirect('admin/parish')->with('message', 'Parroquia Editada Correctamente!');
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
        Parish::destroy($id);

        Session::flash('flash_message', 'Parish deleted!');

        return redirect('admin/parish')->with('message', 'Parroquia Eliminada Correctamente!');
    }

}