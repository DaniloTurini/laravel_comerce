<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    private $categories;
    public function __construct(Category $category)
    {
        $this->categories = $category;
    }

    public function index()
    {
        $categories = $this->categories->all();

        return view('admin.categories.index', compact('categories'));
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
