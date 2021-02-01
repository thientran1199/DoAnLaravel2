<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderDetailEloquentRepository;


/**
 * @group orderdetail
 */
class OrderDetailController extends Controller
{
    protected $order;
    public function __construct(
        OrderDetailEloquentRepository $orderdetail)
    {
        $this->orderdetail = $orderdetail;
    }

    /**
     * index
     */

    public function index()
    {
        $result = $this->orderdetail->getAll();
        return response()->json($result);
        // return api_success(
        //     array('data' => $result)
        // );
        
    }

    /**
     * store
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $result = $this->orderdetail->create($data);
        return response()->json($result);
    }
    /**
     * show
     */
    public function show($id)
    {
        $result = $this->orderdetail->find($id);
        return response()->json($result);
    }

    
    

}
