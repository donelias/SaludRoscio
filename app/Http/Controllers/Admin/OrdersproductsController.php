<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Itemsorder;
use App\Product;

use Session;

class OrdersproductsController extends Controller
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
            $ordersproducts = Ordersproducts::where('ordersproducts', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $ordersproducts = Ordersproducts::paginate($perPage);
        }

        return view('admin.ordersproducts.index', compact('ordersproducts'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
         $products = Product::orderBy('id', 'desc')->pluck('product', 'id');
        //dd($roles);
        return view('admin.ordersproducts.create', compact('products'));
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
        
        $requestData = $request->all(); 
        
        Ordersproducts::create($requestData);

        Session::flash('flash_message', 'ordersproducts added!');


     
        return redirect('admin/ordersproducts')->with('message', 'Direccion Agregada Correctamente!');
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
        $ordersproducts = Ordersproducts::findOrFail($id);

        return view('admin.ordersproducts.show', compact('ordersproducts'));
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
        $ordersproducts = Ordersproducts::findOrFail($id);

        return view('admin.ordersproducts.edit', compact('ordersproducts'));
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
        
        $ordersproducts = Ordersproducts::findOrFail($id);
        $ordersproducts->update($requestData);

        Session::flash('flash_message', 'Ordersproducts updated!');

        return redirect('admin/ordersproducts')->with('message', 'Direccion Editada Correctamente!');
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
        Ordersproducts::destroy($id);

        Session::flash('flash_message', 'Ordersproducts deleted!');

        return redirect('admin/ordersproducts')->with('message', 'Direccion Eliminada Correctamente!');
    }
}
