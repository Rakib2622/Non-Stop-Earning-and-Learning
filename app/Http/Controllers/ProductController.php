<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    // Display a listing of the products
    public function productlist()
    {
        abort_if(Gate::denies('product read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }




    // Show the form for creating a new product
    public function insert_product_page()
{
    abort_if(Gate::denies('product write'), Response::HTTP_FORBIDDEN, '403 Forbidden');   
    return view('admin.products.addproduct');
}

public function show_product_details($id)
{
    abort_if(Gate::denies('product read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    $product = Product::findOrFail($id);
    return view('admin.products.details', compact('product'));
}


    // Store a newly created product in storage
    public function insert_product(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'old_price' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'commission' => 'nullable|numeric',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->old_price = $request->old_price;
        $product->price = $request->price;
        $product->commission = $request->commission;
        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product added successfully!');
    }

    // Show the form for editing the specified product
    public function edit_product_page($id)
    {
        abort_if(Gate::denies('product write'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Update the specified product in storage
    public function update_product(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'old_price' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'commission' => 'nullable|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && file_exists(public_path('images/' . $product->image))) {
                unlink(public_path('images/' . $product->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->old_price = $request->old_price;
        $product->price = $request->price;
        $product->commission = $request->commission;
        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
    }

    // Remove the specified product from storage
    public function delete_product($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }

        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }

    public function order()
    {
        abort_if(Gate::denies('order read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $orders = Order::with('product')->orderBy('created_at', 'desc')->get();
        return view('admin.products.orders', compact('orders'));
    }
}
