<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['customer', 'laundryOwner'])->get();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $reviews
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'laundry_owner_id' => 'required|exists:laundry_owners,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = Review::create($validated);

        return response()->json([
            'status' => 'success',
            'code' => 201,
            'data' => $review
        ], 201);
    }

    public function show($id)
    {
        $review = Review::with(['customer', 'laundryOwner'])->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $review
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'customer_id' => 'sometimes|required|exists:customers,id',
            'laundry_owner_id' => 'sometimes|required|exists:laundry_owners,id',
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'comment' => 'sometimes|nullable|string',
        ]);

        $review->update($validated);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $review
        ], 200);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return response()->json([
            'status' => 'success',
            'code' => 204,
            'data' => null
        ], 204);
    }
}
