<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontend.home', compact('products'));
    }

    public function showProducts()
    {
        $products = Product::all();
        return view('frontend.products', compact('products'));
    }

    // Display specific product details
    public function showProductDetails($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.product_details', compact('product'));
    }


    public function buyNowPage($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.cheackout', compact('product'));
    }
    // Handle the order form submission
    public function orderProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'payable_price'=>'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);

        $order = new Order();
        $order->product_id = $product->id;
        $order->name = $request->input('name');
        $order->mobile = $request->input('mobile');
        $order->city = $request->input('city');
        $order->address = $request->input('address');
        $order->payable_price = $request->input('payable_price');
        $order->status = 'pending';
        $order->save();

        return redirect()->route('home')->with('success', 'Your order has been placed successfully!');
    }
}
