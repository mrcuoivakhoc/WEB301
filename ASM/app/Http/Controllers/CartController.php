<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

// ... existing imports ...

class CartController extends Controller
{
    // ... existing methods ...

    // ... existing methods ...

    public function addToCart($product_id)
    {
        $product = Product::find($product_id);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
    
        $cart = session()->get('cart', []);
    
        // Check if product is already in the cart
        if (isset($cart[$product_id])) {
            // Check if 'quantity' key exists before incrementing
            if (isset($cart[$product_id]['quantity'])) {
                $cart[$product_id]['quantity']++;
            } else {
                $cart[$product_id]['quantity'] = 1;
            }
        } else {
            $cart[$product_id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
    
        session()->put('cart', $cart);
    
        return redirect()->route('cart')->with('success', 'Product added to cart successfully');
    }
    
    public function showCart()
    {
        $brands = Brand::all(); // Retrieve brands from your database
        $categories = Category::all(); // Retrieve categories from your database
        $cart = session()->get('cart', []);
    
        // Tính tổng tiền cho từng sản phẩm trong giỏ hàng và cập nhật giá tiền
        foreach ($cart as $product_id => $item) {
            $product = Product::find($product_id);
            if ($product) {
                $cart[$product_id]['product'] = $product;
                $cart[$product_id]['total'] = $item['price'] * $item['quantity'];
            } else {
                // Nếu sản phẩm không tồn tại trong database, loại bỏ khỏi giỏ hàng
                unset($cart[$product_id]);
            }
        }
    
        return view('frontend.cart', compact('brands', 'categories', 'cart'));
    }
      
    public function removeFromCart($product_id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Product removed from cart successfully');
    }

    public function checkout()
{
    $cart = session()->get('cart', []);
    $total = 0;

    foreach ($cart as $product) {
        $total += $product['price'];
    }

    if (Auth::check()) {
        // Người dùng đã đăng nhập, lưu thông báo vào session
        session()->flash('checkout_message', 'Order placed successfully! Thank you for your purchase.');
    } else {
        // Người dùng chưa đăng nhập, lưu thông báo yêu cầu đăng nhập
        session()->flash('checkout_message', 'Please log in or register an account before proceeding to payment.');
    }

    // Xóa giỏ hàng sau khi lưu thông báo
    session()->forget('cart');

    return redirect()->route('cart'); // Chuyển hướng trở lại trang giỏ hàng
}

    

    public function placeOrder()
    {
        // Logic to process the order and clear the cart
        // You need to implement this logic based on your application's requirements

        session()->forget('cart'); // Clear the cart
        return redirect()->route('cart')->with('success', 'Order placed successfully');
    }
}
