<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->with(['category','supplier']);

        if ($request->filled('category_id')) $query->where('category_id', $request->category_id);
        if ($request->filled('supplier_id')) $query->where('supplier_id', $request->supplier_id);
        if ($request->filled('min_price')) $query->where('price', '>=', $request->min_price);
        if ($request->filled('max_price')) $query->where('price', '<=', $request->max_price);
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($q2) use ($q) {
                $q2->where('name', 'like', "%{$q}%")
                   ->orWhere('description', 'like', "%{$q}%");
            });
        }

        return response()->json($query->paginate(20));
    }

    public function show($id)
    {
        $product = Product::with(['category','supplier'])->find($id);
        if (! $product) return response()->json(['message'=>'Product not found'], 404);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:200',
            'price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'description' => 'nullable|string',
        ]);

        $product = Product::create($data);
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (! $product) return response()->json(['message'=>'Product not found'], 404);

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:200',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|integer|min:0',
            'category_id' => 'sometimes|exists:categories,id',
            'supplier_id' => 'sometimes|exists:suppliers,id',
            'description' => 'nullable|string',
        ]);

        $product->update($data);
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (! $product) return response()->json(['message'=>'Product not found'], 404);
        $product->delete();
        return response()->json(['message'=>'Product deleted']);
    }

    // Adjust stock manually (for inventory adjustments)
    public function adjustStock(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'reason' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->stock = max(0, ($product->stock ?? 0) + (int)$request->quantity);
        $product->save();

        return response()->json($product);
    }
}
