<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Statu;
use App\Repositories\ClientRepository,
    App\Repositories\ProductRepository,
    App\Repositories\OrderRepository;
use Session;
use App\Http\Requests,
    PDF;

class OrderController extends Controller
{
    private $_clientRepo;
    private $_productRepo;
    private $_orderRepo;

    public function __CONSTRUCT(
        ClientRepository $clientRepo,
        ProductRepository $productRepo,
        OrderRepository $orderRepo
    )
    {
        $this->_clientRepo = $clientRepo;
        $this->_productRepo = $productRepo;
        $this->_orderRepo = $orderRepo;
    }


    public function detail($id)
    {
        return view('invoice.detail', [
            'model' => $this->_orderRepo->get($id)
        ]);
    }

    public function pdf($id)
    {
        $model = $this->_orderRepo->get($id);
        $invoice_name = sprintf('Orden-%s.pdf', str_pad ($model->id, 7, '0', STR_PAD_LEFT));

        $pdf = PDF::loadView('invoice.pdf', [
            'model' => $model
        ]);

        return $pdf->download($invoice_name);
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $order = Order::where('id', 'LIKE', "%$keyword%")
                ->orWhere('person_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $order = Order::orderBy('id', 'desc')
                ->paginate($perPage);
        }

        return view(
            'invoice.index', compact('order')
        );
    }

    public function index2($id)
    {
        $perPage = 5;

            $order = Order::where('statu_id', $id)
                ->orWhere('typeorder_id', $id)
                ->orderBy('id', 'desc')
                ->paginate($perPage);

        return view(
            'invoice.index', compact('order')
        );
    }

    public function entregar($id)
    {
        return view('invoice.entregar', [
            'model' => $this->_orderRepo->get($id)
        ]);
    }

    public function orderSave(Request $req)
    {
        //var_dump($req);
        $data = (object)[
            'client_id' => $req->input('client_id'),
            'total' => $req->input('total'),
            'detail' => []
        ];

        foreach($req->input('detail') as $d){
            $data->detail[] = (object)[
                'product_id' => $d['id'],
                'quantity'   => $d['quantity']

            ];
        }

        return $this->_orderRepo->save($data);

    }

    public function orderSaveOut(Request $req)
    {
        //var_dump($req);
        $data = (object)[
            'client_id' => $req->input('client_id'),
            'total' => $req->input('total'),
            'detail' => []
        ];

        foreach($req->input('detail') as $d){
            $data->detail[] = (object)[
                'product_id' => $d['id'],
                'quantity'   => $d['quantity']

            ];
        }

        return $this->_orderRepo->saveOut($data);

    }


    public function findProduct(Request $req)
    {
        return $this->_productRepo
            ->findByName($req->input('q'));
    }
    
    public function findClient(Request $req)
    {
        return $this->_clientRepo
            ->findByName($req->input('q'));
    }
    
    
    public  function addInto(){

        return view('invoice.addInto');
    }

    public  function addOut(){

        return view('invoice.addOut');
    }


}
