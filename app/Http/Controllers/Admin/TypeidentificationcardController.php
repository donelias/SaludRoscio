<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Typeidentificationcard;
use App\People;
use Session;
class TypeidentificationcardController extends Controller
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
            $typeidentificationcard = Typeidentificationcard::where('typeidentificationcard', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $typeidentificationcard = Typeidentificationcard::paginate($perPage);
        }

        return view('admin.typeidentificationcard.index', compact('typeidentificationcard'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
    
        //dd($roles);
          return view('admin.typeidentificationcard.create', compact('peoples'));
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
           'typeidentificationcard' => 'required|unique:typeidentificationcards'
       
        ]); 

         $requestData = $request->all();
        
        Typeidentificationcard::create($requestData);

     
        return redirect('admin/typeidentificationcard')->with('message', 'Farmaco Agregado Correctamente!');
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
        $typeidentificationcard = Typeidentificationcard::findOrFail($id);

        return view('admin.typeidentificationcard.show', compact('typeidentificationcard'));
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
        $typeidentificationcard = Typeidentificationcard::findOrFail($id);

        return view('admin.typeidentificationcard.edit', compact('typeidentificationcard'));
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
        
        $typeidentificationcard = Typeidentificationcard::findOrFail($id);
        $typeidentificationcard->update($requestData);

        Session::flash('flash_message', 'Typeidentificationcard updated!');

        return redirect('admin/typeidentificationcard')->with('message', 'Farmaco Editado Correctamente!');
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
        Typeidentificationcard::destroy($id);

        Session::flash('flash_message', 'Typeidentificationcard deleted!');

        return redirect('admin/typeidentificationcard')->with('message', 'Farmaco Eliminado Correctamente!');
    }
}
