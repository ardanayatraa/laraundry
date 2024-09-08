<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $customers
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $customer = Customer::create($validated);

        return response()->json([
            'status' => 'success',
            'code' => 201,
            'data' => $customer
        ], 201);
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $customer
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $customer->update($validated);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $customer
        ], 200);
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return response()->json([
            'status' => 'success',
            'code' => 204,
            'data' => null
        ], 204);
    }
}
