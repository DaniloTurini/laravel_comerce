<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $products;

    public function __construct(Product $product)
    {
        $this->products = $product;
    }

    public function index()
    {
        $products = $this->products->all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return 'create';
    }

    public function edit($id)
    {
        return $id;
    }

    public function destroy($id)
    {
        return $id;
    }

    public function update($id)
    {
        return $id;
    }

    public function store()
    {
        return 'store';
    }
}
