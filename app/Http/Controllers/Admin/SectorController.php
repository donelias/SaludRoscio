<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sector;
use App\Parish;
use Illuminate\Http\Request;
use Session;

class SectorController extends Controller
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
            $sector = Sector::where('sector', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $sector = Sector::paginate($perPage);
        }

        return view('admin.sector.index', compact('sector'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $parishes = Parish::orderBy('id', 'desc')->pluck('parish', 'id');
        //dd($roles); 
        return view('admin.sector.create', compact('parishes'));
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
           'sector' => 'required|max:50|unique:sectors',
            'parish_id' => 'required'
        ]); 
    

                $requestData = $request->all();
        
        Sector::create($requestData);



        return redirect('admin/sector')->with('message', 'Sector Agregado Correctamente!');
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
        $sector = Sector::findOrFail($id);

        return view('admin.sector.show', compact('sector'));
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
         $parishes = Parish::orderBy('id', 'desc')->pluck('parish', 'id');
        $sector = Sector::findOrFail($id);

        return view('admin.sector.edit', compact('sector', 'parishes'));
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
        
        $sector = Sector::findOrFail($id);
        $sector->update($requestData);

        Session::flash('flash_message', 'Sector updated!');

        return redirect('admin/sector')->with('message', 'Sector Editado Correctamente!');
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
        Sector::destroy($id);

        Session::flash('flash_message', 'Sector deleted!');

        return redirect('admin/sector')->with('message', 'Sector Eliminado Correctamente!');
    }
}
