<?php

namespace App\Repositories;

use App\Order;
use App\Orderproducts;
use App\Ordersproducts;
use App\Product;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class OrderRepository {
    private $model;
    
    public function __construct(){
        $this->model = new Order();
    }
    
    
    public function get($id) {
        return $this->model->find($id);
    }

    public function getAll() {
        return $this->model->orderBy('id', 'desc')->get();
    }

    public function save($data) {

        $user = Auth::user();
        $return = (object)[
            'response' => false
        ];

        try {
            DB::beginTransaction();

            $this->model->typeorder_id = '1';
            $this->model->personAuthorizes_id = '1';
            $this->model->person_id = $data->client_id;
            $this->model->personWithdraw_id = '1';
            //$this->model->total = $data->total;
            $this->model->statu_id = '1';
            $this->model->user_id = $user->id;
            
            $this->model->save();

            //registrar detalles
            $detail = [];

            foreach($data->detail as $d) {
                $obj = new Ordersproducts();

                $obj->quantity = $d->quantity;
                $obj->product_id = $d->product_id;

                $detail[] = $obj;
            }
            $this->model->ordersproducts()->saveMany($detail);

            foreach($data->detail as $stock){
                $id = $stock->product_id;
                $quantity = $stock->quantity;

                $this->stock($id, $quantity );
            }
            
            $return->response = true;

            DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
        }

            return json_encode($return);
            //dd($data);
    }

    public function saveOut($data) {

        $user = Auth::user();
        $return = (object)[
            'response' => false
        ];

        try {
            DB::beginTransaction();


            $this->model->typeorder_id = '2';
            $this->model->person_id = $data->client_id;
            //$this->model->total = $data->total;
            $this->model->statu_id = '3';
            $this->model->user_id = $user->id;

            $this->model->save();

            //registrar detalles
            $detail = [];
            foreach($data->detail as $d) {
                $obj = new Ordersproducts();

                $obj->quantity = $d->quantity;
                $obj->product_id = $d->product_id;

                $detail[] = $obj;
            }
            $this->model->ordersproducts()->saveMany($detail);

            foreach($data->detail as $stock){
                $id = $stock->product_id;
                $quantity = $stock->quantity;

                $this->stockOut($id, $quantity );
            }

            $return->response = true;

           DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
        }

        return json_encode($return);
        //dd($data);
    }

    private function stock($id, $quantity )
    {
        $product = Product::findOrFail($id);

        //echo " Id: " ." " .$product->id ." "."Stock en db: ".$product->quantityexisting ;

        $stock_db = $product->quantityexisting;
        $stock_order = $quantity;

        $total_stock = $stock_db + $stock_order;

        //echo '<br>'. $total_stock;

        $product->where('id', $id)
            ->update(['quantityexisting' => $total_stock]);

    }

    private function stockOut($id, $quantity )
    {
        $product = Product::findOrFail($id);

        //echo " Id: " ." " .$product->id ." "."Stock en db: ".$product->quantityexisting ;

        $stock_db = $product->quantityexisting;
        $stock_order = $quantity;

        $total_stock = $stock_db - $stock_order;

        //echo '<br>'. $total_stock;

        $product->where('id', $id)
            ->update(['quantityexisting' => $total_stock]);

    }
    
}
