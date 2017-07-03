<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Statu;
use App\Product;
use App\Order;
use Session;

class StatuController extends Controller
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
            $statu = Statu::where('statu', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $statu = Statu::paginate($perPage);
        }

        return view('admin.statu.index', compact('statu'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
   
        //dd($roles);
        return view('admin.statu.create', compact('products'));
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
           'statu' => 'required|unique:status'
       
        ]); 

         $requestData = $request->all();
        
        Statu::create($requestData);

     
        return redirect('admin/statu')->with('message', 'Estatu Agregado Correctamente!');
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
        $statu = Statu::findOrFail($id);

        return view('admin.statu.show', compact('statu'));
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
        $statu = Statu::findOrFail($id);

        return view('admin.statu.edit', compact('statu'));
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
        
        $statu = Statu::findOrFail($id);
        $statu->update($requestData);

        Session::flash('flash_message', 'Statu updated!');

        return redirect('admin/statu')->with('message', 'Estatu Editado Correctamente!');
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
        Statu::destroy($id);

        Session::flash('flash_message', 'Statu deleted!');

        return redirect('admin/statu')->with('message', 'Estatu Eliminado Correctamente!');
    }
}
