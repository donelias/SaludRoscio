<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
//use App\Http\Request\StoreProductRequest;
use App\Product;
use App\Typemedicine;
use App\Classification;
use App\Drug;
use App\Measurement;
use App\Laboratory;
use App\Statu;
use App\Http\Requests;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Input;   // though added some classes to get work
use Illuminate\Support\Facades\File;    // though added some classes to get work
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Validation;
use Validator;
   // though added some classes to get work

class ProductController extends Controller
{
    
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
            $products = Product::where('code', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);

            foreach ($products as $product) {
                //Cambiamos el formato de Año-Mes-Dia a Dia/Mes/Año
                $product->expiration_date = Carbon::createFromFormat('Y-m-d', $product->expiration_date)->format('d/m/Y');
            }
        } else {
            $products = Product::orderBy('expiration_date', 'ASC')
                ->paginate($perPage);

            foreach ($products as $product) {
                //Cambiamos el formato de Año-Mes-Dia a Dia/Mes/Año
                $product->expiration_date = Carbon::createFromFormat('Y-m-d', $product->expiration_date)->format('d/m/Y');
            }
        }

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $typemedicines = Typemedicine::orderBy('id', 'desc')->pluck('typemedicine', 'id');
        $classifications = Classification::orderBy('id', 'desc')->pluck('classification', 'id');
        $drugs = Drug::orderBy('id', 'desc')->pluck('drug', 'id');
        $measurements = Measurement::orderBy('id', 'desc')->pluck('measurement', 'id');
       // $status = Statu::orderBy('id', 'desc')->pluck('statu', 'id');
        $laboratories = Laboratory::orderBy('id', 'desc')->pluck('laboratory', 'id');

        return view('admin.product.create', compact('typemedicines', 'classifications', 'drugs', 'measurements', 'laboratories'));
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

          $path = 'uploads/sistema/';
          $file = Input::file('photo'); 
          $archivo = $path.$file->getClientOriginalName();
          $extension =$file->getClientOriginalExtension(); 
          //$tamano=$->getSize();
        //$mime=$file->getMimeType();
         //echo "archivo=".$archivo."<br>extension=".$extension."<br>porte=".$tamano;exit;
         $upload = $file->move($path, $archivo);

         if($upload)
         {
            $inputs=Input::All();

            /**
             * Esta es la funcion para validar de manera manual
             */
            $validator = Validator::make($inputs, [
                'name' => 'required',
                'grams' => 'required|numeric',
                'expiration_date' => 'required|date_format:d/m/Y',
                'quantityproduct' => 'required',
                'typemedicine_id' => 'required',
                'classification_id' => 'required',
                'drug_id' => 'required',
                'measurement_id' => 'required',
                'laboratory_id' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('admin/product/create')->withErrors($validator)->withInput();
            }

            /**
             * Obtenemos el ultimo producto por su codigo 
             */
            $lastCode = Product::orderBy('code', 'DESC')->first();

            #Si no existe un producto o no tiene un codigo se le asigna, si no se incrementa en 1
            if ($lastCode != null) {
                $lastCode = str_pad(($lastCode->code+1), 5, '0', STR_PAD_LEFT);
            } else {
                $lastCode = str_pad('1', 5, '0', STR_PAD_LEFT);
            }

            $n= new Product;
            $n->code = $lastCode; #Se asigna el codigo al nuevo producto
            $n->name=$inputs["name"];
            $n->grams=$inputs["grams"];

            //Cambiamos el formato de Dia/Mes/Año a Año-Mes-Dia
            $n->expiration_date = Carbon::createFromFormat('d/m/Y', $inputs["expiration_date"])->format('Y-m-d');
            $n->quantityproduct=$inputs["quantityproduct"];
            $n->quantityexisting="0";
            $n->typemedicine_id=$inputs["typemedicine_id"];
            $n->classification_id=$inputs["classification_id"]; 
            $n->drug_id=$inputs["drug_id"];
            $n->measurement_id=$inputs["measurement_id"];
            $n->laboratory_id=$inputs["laboratory_id"];
            $n->photo= $archivo;
            $n->statu_id="1";
            $n->save();

            //Session::flash('mensaje', 'su registro se ingresó correctamente');
           // return Redirect::to('admin/product');
            return redirect('admin/product')->with('message', 'Producto Agregado Correctamente!');
       }else
         {
           // Session::flash('mensaje', 'no se pudo subir el archivo');
            return Redirect::to('admin/product')->with('message', 'no se pudo subir el archivo!');

         }
//dd($file);
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
        $product = Product::findOrFail($id);
        $path = 'uploads/sistema';
      
        
         //dd($product);
        return view('admin.product.show', compact('product', 'path'));
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
        $typemedicines = Typemedicine::orderBy('id', 'desc')->pluck('typemedicine', 'id');
        $classifications = Classification::orderBy('id', 'desc')->pluck('classification', 'id');
        $drugs = Drug::orderBy('id', 'desc')->pluck('drug', 'id');
        $measurements = Measurement::orderBy('id', 'desc')->pluck('measurement', 'id');
        $laboratories = Laboratory::orderBy('id', 'desc')->pluck('laboratory', 'id');

        $product = Product::findOrFail($id);
        $path = 'uploads/sistema';

        return view('admin.product.edit', compact('product', 'typemedicines', 'classifications', 'drugs', 'measurements', 'laboratories'));
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
        
        $product = Product::findOrFail($id);

        if ($request->file('photo')) {
            $path = 'uploads/sistema/';
            $file = $request->file('photo'); 
            $archivo = $path.$file->getClientOriginalName();
            $extension =$file->getClientOriginalExtension(); 
          
            $upload = $file->move($path, $archivo);

            $product->photo = $archivo;
        }

        $product->name = $request->get("name");
        $product->grams = $request->get("grams");
        $product->expiration_date = $request->get("expiration_date");
        $product->quantityproduct = $request->get("quantityproduct");
        $product->typemedicine_id = $request->get("typemedicine_id");
        $product->classification_id = $request->get("classification_id"); 
        $product->drug_id = $request->get("drug_id");
        $product->measurement_id = $request->get("measurement_id");
        $product->laboratory_id = $request->get("laboratory_id");

        
        $product->save();

        //Session::flash('flash_message', 'Product updated!');

        return redirect('admin/product')->with('message', 'Producto Editado Correctamente!');
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
        Product::destroy($id);

        Session::flash('flash_message', 'Product deleted!');

        return redirect('admin/product')->with('message', 'Producto Eliminado Correctamente!');
    }
}
