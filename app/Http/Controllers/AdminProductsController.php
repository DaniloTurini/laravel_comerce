<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests\RequestProduct;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $products;

    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    public function index()
    {
        $products = $this->productModel->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('admin.products.create', compact('categories'));
    }

    public function store(RequestProduct $request)
    {
        $featured = $request->has('featured')? 1 : 0;
        $recommend  = $request->has('recommend')? 1 : 0;

        $this->productModel->create([
                                    'name'=>$request->get('name'),
                                    'description'=>$request->get('description'),
                                    'price'=>$request->get('price'),
                                    'category_id'=>$request->get('category_id'),
                                    'featured'=>$featured,
                                    'recommend'=>$recommend]);

        return redirect()->route('admin.products.index');
    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');
        $product = $this->productModel->find($id);
        return view('admin.products.edit', compact('product','categories'));
    }

    public function update($id, RequestProduct $request)
    {
        $featured = $request->has('featured')? 1 : 0;
        $recommend  = $request->has('recommend')? 1 : 0;

        $this->productModel->find($id)->update([
                                        'name'=>$request->get('name'),
                                        'description'=>$request->get('description'),
                                        'price'=>$request->get('price'),
                                        'category_id'=>$request->get('category_id'),
                                        'featured'=>$featured,
                                        'recommend'=>$recommend]);

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete($id);
        return redirect()->route('admin.products.index');
    }

}
