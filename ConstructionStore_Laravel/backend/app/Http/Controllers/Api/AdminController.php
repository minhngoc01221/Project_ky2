<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Lấy danh sách admin
    public function index()
    {
        return response()->json(Admin::all(), 200);
    }

    // Thêm admin
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|unique:admins,username',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:admins,email',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $admin = Admin::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Thêm admin thành công!',
            'data' => $admin
        ], 201);
    }

    // Xem chi tiết admin
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return response()->json($admin, 200);
    }

    // Cập nhật admin
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validated = $request->validate([
            'username' => 'sometimes|required|string|unique:admins,username,'.$id,
            'password' => 'sometimes|required|string|min:6',
            'email' => 'sometimes|required|email|unique:admins,email,'.$id,
        ]);

        if(isset($validated['password'])){
            $validated['password'] = Hash::make($validated['password']);
        }

        $admin->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật admin thành công!',
            'data' => $admin
        ], 200);
    }

    // Xóa admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa admin thành công!'
        ], 200);
    }
}
