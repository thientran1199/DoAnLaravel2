<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderEloquentRepository;


/**
 * @group order
 */
class OrderController extends Controller
{
    protected $order;
    public function __construct(
        OrderEloquentRepository $order)
    {
        $this->order = $order;
    }

    /**
     * index
     */

    public function index()
    {
        $result = $this->order->getAll();
        return response()->json($result);
        // return api_success(
        //     array('data' => $result)
        // );
        
    }

    /**
     * cretaed
     */
     public function created(Request $request)
    {
        $data = $request->all();
        $result = $this->order->create($data);

        return response()->json($result);
    }
    /**
     * show
     */
    public function show($id)
    {
        $result = $this->order->find($id);
        return response()->json($result);
    }

    
    

}
