<?php

namespace App\Repositories;

use App\People;
use Illuminate\Support\Facades\DB;

class ClientRepository {
    private $model;
    
    public function __construct(){
        $this->model = new People();
    }

    public function findByName($q) {
        return $this->model->where('name', 'like', "%$q%")
            ->orWhere('identificationcard', 'like', "%$q%")
            ->get();
    }
}
