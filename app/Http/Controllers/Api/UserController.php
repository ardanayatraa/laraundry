<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $users
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::create($validated);

        return response()->json([
            'status' => 'success',
            'code' => 201,
            'data' => $user
        ], 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $user
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'phone' => 'sometimes|required',
            'address' => 'sometimes|required',
            'role' => 'sometimes|required',
            'password' => 'sometimes|required|min:6',
        ]);

        $user->update($validated);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $user
        ], 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'status' => 'success',
            'code' => 204,
            'data' => null
        ], 204);
    }
}
