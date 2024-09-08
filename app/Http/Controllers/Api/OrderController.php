<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer', 'laundryOwner', 'items'])->get();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $orders
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'laundry_owner_id' => 'required|exists:laundry_owners,id',
            'order_number' => 'required|unique:orders',
            'total_weight' => 'required|numeric',
            'status' => 'required',
            'pickup_date' => 'required|date',
            'delivery_date' => 'required|date',
            'total_price' => 'required|numeric',
        ]);

        $order = Order::create($validated);

        return response()->json([
            'status' => 'success',
            'code' => 201,
            'data' => $order
        ], 201);
    }

    public function show($id)
    {
        $order = Order::with(['customer', 'laundryOwner', 'items'])->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $order
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'customer_id' => 'sometimes|required|exists:customers,id',
            'laundry_owner_id' => 'sometimes|required|exists:laundry_owners,id',
            'order_number' => 'sometimes|required|unique:orders,order_number,' . $id,
            'total_weight' => 'sometimes|required|numeric',
            'status' => 'sometimes|required',
            'pickup_date' => 'sometimes|required|date',
            'delivery_date' => 'sometimes|required|date',
            'total_price' => 'sometimes|required|numeric',
        ]);

        $order->update($validated);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $order
        ], 200);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json([
            'status' => 'success',
            'code' => 204,
            'data' => null
        ], 204);
    }
}

