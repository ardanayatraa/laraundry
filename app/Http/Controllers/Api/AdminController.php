<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $admins
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $admin = Admin::create($validated);

        return response()->json([
            'status' => 'success',
            'code' => 201,
            'data' => $admin
        ], 201);
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $admin
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $admin->update($validated);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $admin
        ], 200);
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return response()->json([
            'status' => 'success',
            'code' => 204,
            'data' => null
        ], 204);
    }
}
