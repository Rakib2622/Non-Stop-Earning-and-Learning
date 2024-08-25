<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{
    // Method to list all products for the user
    public function productlist()
    {
        $products = Product::all(); // Retrieve all products from the database
        return view('frontend.after_login.products.index', compact('products'));
    }

    // Method to show the details of a specific product
    public function show_product_details($id)
    {
        $product = Product::findOrFail($id); // Find the product by its ID
        return view('frontend.after_login.products.details', compact('product'));
    }

    public function view_orders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get(); // Retrieve all orders for the user
        return view('frontend.after_login.products.orders', compact('orders'));
    }

    // Method to view the user's cart
    public function view_cart()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get(); // Retrieve all cart items for the user
        return view('frontend.after_login.products.cart', compact('cartItems'));
    }

    public function order_now($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        // Create a new order
        $order = new Order();
        $order->user_id = $user->id;
        $order->product_id = $product->id;
        $order->status = 'pending'; // Set initial status
        $order->save();

        return redirect()->route('user.products')->with('success', 'Order placed successfully!');
    }

    // Method for adding a product to the cart
    public function add_to_cart($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        // Add product to the user's cart
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->product_id = $product->id;
        $cart->quantity = 1; // Set default quantity
        $cart->save();

        return redirect()->route('user.product.details', $product->id)->with('success', 'Product added to cart!');
    }
}
