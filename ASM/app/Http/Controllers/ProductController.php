<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
Paginator::useBootstrap();
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $products = Product::paginate(6);
        return view('product.index', ['products' => $products]);
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all(); // Lấy danh sách tag
        return view('product.create', ['brands' => $brands, 'categories' => $categories, 'tags' => $tags]);
    }  
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $product->image = str_replace('public/', '/storage/', $imagePath);
        }

        $product->save();
            // Thêm tag cho sản phẩm
            $tags = $request->input('tags');
            $product->tags()->attach($tags);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $product = Product::find($id);
    $brands = Brand::all();
    $categories = Category::all();
    $tags = Tag::all(); // Assuming Tag is the model for your tags
    
    // Get the IDs of tags associated with the product
    $productTags = $product->tags->pluck('id')->toArray();
    
    return view('product.edit', [
        'product' => $product,
        'brands' => $brands,
        'categories' => $categories,
        'tags' => $tags,
        'productTags' => $productTags, // Pass the array of tag IDs to the view
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->brand_id = $request->input('brand');
        $product->category_id = $request->input('category');
        
        

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            storage::delete(str_replace('/storage/','public/', $product->image));
            $product->image = $request->file('image')->store('public/images');
            $product->image = str_replace('public/', '/storage/', $imagePath);
        }
        $tags = $request->input('tags');
        $product->tags()->sync($tags);
        $product->save();
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
        
    }
    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $products = Product::where('name', 'like', '%' . $keyword . '%')->paginate(6);
        return view('product.index', compact('products', 'keyword'));
    }
}