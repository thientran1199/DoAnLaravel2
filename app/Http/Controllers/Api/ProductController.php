<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductEloquentRepository;

/**
 * @group products
 */
class ProductController extends Controller
{
    protected $products;

    public function __construct(
        ProductEloquentRepository $products){
        $this->products = $products;   
    }

    /**
     * index
     */
    public function index()
    {
        $result = $this->products->getAll();
        return response()->json($result);
        // return api_success(
        //     array('data' => $this->productRepository->all())
        // );
        
    }

    /**
     * show
     */
    public function show($id)
    {
        $result = $this->products->find($id);
        return api_success(
            array('data' => $result)
        );
    }

    /**
     * search
     */
    public function search(Request $request)
    {
        $key_word = $request->input('q');
        $products = Product::where('name', 'like', "%$key_word%")->get();
        return api_success(
            array('data' => $products)
        );
    }

    /**
     * store
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $result = $this->products->create($data);

        return api_success(
            array('data' => $result)
        );
    }

    /**
     * update
     */
    public function update($id, Request $request)
    {
        $data = $request->all();

        $result = $this->products->update($id, $data);

        return api_success(
            array('data' => $result)
        );
    }

    /**
     * destroy
     * @urlparam id int required 
     */
    public function destroy($id)
    {
        $result = $this->products->delete($id);

        return api_success(
            array('data' => "ok")
        );
    }
}
