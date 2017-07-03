<?php

namespace App\Repositories;

use App\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository {
    private $model;
    
    public function __construct(){
        $this->model = new Product();
    }

    public function findByName($q) {
        return DB::table('products')->join('laboratories', 'products.laboratory_id', '=', 'laboratories.id')
            ->join('drugs', 'products.drug_id', '=', 'drugs.id')
            ->join('measurements', 'products.measurement_id', '=', 'measurements.id')
            ->where('name', 'like', "%$q%")
            ->orWhere('code', 'like', "%$q%")
            ->orderBy('expiration_date', 'asc')
            ->get();
    }

}
