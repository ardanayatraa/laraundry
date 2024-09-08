<?php

namespace App\Http\Controllers\Api;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order')->get();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $payments
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required',
        ]);

        $payment = Payment::create($validated);

        return response()->json([
            'status' => 'success',
            'code' => 201,
            'data' => $payment
        ], 201);
    }

    public function show($id)
    {
        $payment = Payment::with('order')->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $payment
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $validated = $request->validate([
            'order_id' => 'sometimes|required|exists:orders,id',
            'amount' => 'sometimes|required|numeric',
            'payment_date' => 'sometimes|required|date',
            'status' => 'sometimes|required',
        ]);

        $payment->update($validated);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $payment
        ], 200);
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response()->json([
            'status' => 'success',
            'code' => 204,
            'data' => null
        ], 204);
    }
}
