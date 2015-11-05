<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests\RequestCategory;
use CodeCommerce\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    private $categories;
    public function __construct(Category $category)
    {
        $this->categoryModel = $category;
    }

    public function index()
    {
        $categories = $this->categoryModel->all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function edit($id)
    {
        $category = $this->categoryModel->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update($id, RequestCategory $request)
    {
        $this->categoryModel->find($id)->update($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $this->categoryModel->find($id)->delete($id);
        return redirect()->route('admin.categories.index');
    }

    public function store(RequestCategory $request)
    {
        $this->categoryModel->create($request->all());
        return redirect()->route('admin.categories.index');
    }

}
