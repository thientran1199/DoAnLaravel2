<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryEloquentRepository;

/**
 * @group categories
 */
class CategoryController extends Controller
{
    protected $categories;
    public function __construct(
        CategoryEloquentRepository $categories)
    {
        $this->categories = $categories;
    }

    /**
     * index
     */
    public function index()
    {
        $result = $this->categories->getAll();
        return response()->json($result);
        // return api_success(
        //     array('data' => $result)
        // );
        
    }
    /**
     * show
     */
    public function show($id)
    {
        $result = $this->categories->find($id);
        return api_success(
            array('data' => $result)
        );
    }
    /**
     * search
     */
    public function search(Request $request, $id)
    {
        $key_word = $request->input('q');
        $products = Product::where('category_id', $id)->where('name', 'like', "%$key_word%")->get();
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
        $result = $this->categories->create($data);
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
        $result = $this->categories->update($id, $data);
        return api_success(
            array('data' => $result)
        );
    }

    /**
     * showById
     */
    public function showById($id){
        $result = $this->categories->find($id);
        return response()->json($result->products);
    }

    /**
     * destroy
     */
    public function destroy($id)
    {
        $this->categories->delete($id);
        return api_success(
            array('data' => "ok")
        );
    }
}
