<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Tag;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests\RequestProduct;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

        $product = $this->productModel->create([
                                    'name'=>$request->get('name'),
                                    'description'=>$request->get('description'),
                                    'price'=>$request->get('price'),
                                    'category_id'=>$request->get('category_id'),
                                    'featured'=>$featured,
                                    'recommend'=>$recommend]);

        $product->tags()->sync($this->getTagsIds($request->tags));

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

        $product = $this->productModel->find($id);
        $product->tags()->sync($this->getTagsIds($request->tags));

        return redirect()->route('admin.products.index');
    }

    public function destroy($id, ProductImage $productImage)
    {
        $productImage->where('product_id',$id)->delete();

        $this->productModel->find($id)->delete($id);
        return redirect()->route('admin.products.index');
    }

    public function images($id)
    {
        $product = $this->productModel->find($id);

        return view('admin.products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('admin.products.create_image', compact('product'));
    }

    public function storeImage(ProductImageRequest $request,$id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('admin.products.images',['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if (file_exists(public_path() . '/uploads/'.$image->id.'.'.$image->extension)){
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('admin.products.images', ['id'=>$product->id]);
    }

    private function getTagsIds($tags)
    {
        $tagList = array_filter(array_map('trim', explode(',', $tags)));
        $tagsIDs = [];
        foreach($tagList as $tagName)
        {
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }

        return $tagsIDs;
    }

}
