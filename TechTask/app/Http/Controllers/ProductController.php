<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        
        $products = Product::all();

       
        return view('products', compact('products'));
    }
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        return view('product.show', compact('product'));
    }

    public function expensiveProducts($amount)
    {
        $products = Product::where('price', '>', $amount)->get();
        return view('product.expensive', compact('products'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

     
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'nullable|integer|exists:categories,id',
        ]);

       
        $product->update($validatedData);

      
        return redirect()->route('products.show', $product->id)
                         ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
    
        $this->authorize('delete', $product);

        $product->delete();

        
        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }

    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

       
        $product = Product::create($validatedData);

       
        return response()->json($product);
    }
}
