<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::with('order')->get();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $orderItems
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'item_name' => 'required',
            'item_quantity' => 'required|integer',
            'item_price' => 'required|numeric',
        ]);

        $orderItem = OrderItem::create($validated);

        return response()->json([
            'status' => 'success',
            'code' => 201,
            'data' => $orderItem
        ], 201);
    }

    public function show($id)
    {
        $orderItem = OrderItem::with('order')->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $orderItem
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);

        $validated = $request->validate([
            'order_id' => 'sometimes|required|exists:orders,id',
            'item_name' => 'sometimes|required',
            'item_quantity' => 'sometimes|required|integer',
            'item_price' => 'sometimes|required|numeric',
        ]);

        $orderItem->update($validated);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $orderItem
        ], 200);
    }

    public function destroy($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->delete();

        return response()->json([
            'status' => 'success',
            'code' => 204,
            'data' => null
        ], 204);
    }
}
