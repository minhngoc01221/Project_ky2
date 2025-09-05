<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product; 
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Lấy danh sách sản phấm
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    // Thêm sản phẩm
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'supplier_id' => 'required|integer|exists:suppliers,id',
            'stock' => 'required|integer'
        ]);

        $product = Product::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Thêm sản phẩm thành công!',
            'data' => $product
        ], 201);
    }

    // Xem chi tiết sản phẩm
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product, 200);
    }

    // Sửa sản phẩm
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:200',
            'price' => 'sometimes|required|numeric',
            'category_id' => 'sometimes|required|integer|exists:categories,id',
            'supplier_id' => 'sometimes|required|integer|exists:suppliers,id',
            'stock' => 'sometimes|required|integer'
        ]);

        $product->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật sản phẩm thành công!',
            'data' => $product
        ], 200);
    }

    // Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa sản phẩm thành công!'
        ], 200);
    }
}
