<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\productDetail;

class FrontendController extends Controller
{
    public function index(Request $request)
{
    $category_id = $request->input('category');
    $brand_id = $request->input('brand');
    $keyword = $request->input('search');

    $query = Product::query();

    if ($category_id) {
        $query->where('category_id', $category_id);
    }

    if ($brand_id) {
        $query->where('brand_id', $brand_id);
    }

    if ($keyword) {
        $query->where('name', 'like', '%' . $keyword . '%');
    }

    $products = $query->paginate(6);
    $categories = Category::all();
    $brands = Brand::all();

    return view('frontend.index', compact('products', 'categories', 'brands', 'keyword'));
}
public function productDetail($id)
{
    $product = Product::findOrFail($id);
    $brands = Brand::all(); // Retrieve brands from your database
    $categories = Category::all(); // Retrieve categories from your database
    
    return view('frontend.product-detail', compact('product', 'brands', 'categories'));
}





}
