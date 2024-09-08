<?php

namespace App\Http\Controllers\Api;

use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::with(['order'])->get();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $deliveries
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'delivery_date' => 'required|date',
            'delivery_status' => 'required',
        ]);

        $delivery = Delivery::create($validated);

        return response()->json([
            'status' => 'success',
            'code' => 201,
            'data' => $delivery
        ], 201);
    }

    public function show($id)
    {
        $delivery = Delivery::with(['order'])->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $delivery
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $delivery = Delivery::findOrFail($id);

        $validated = $request->validate([
            'order_id' => 'sometimes|required|exists:orders,id',
            'delivery_date' => 'sometimes|required|date',
            'delivery_status' => 'sometimes|required',
        ]);

        $delivery->update($validated);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $delivery
        ], 200);
    }

    public function destroy($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();

        return response()->json([
            'status' => 'success',
            'code' => 204,
            'data' => null
        ], 204);
    }
}
