<?php

namespace App\Http\Controllers\Api;

use App\Models\LaundryOwner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaundryOwnerController extends Controller
{
    public function index()
    {
        $laundryOwners = LaundryOwner::all();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $laundryOwners
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'laundry_name' => 'required',
            'laundry_address' => 'required',
            'registration_date' => 'required|date',
        ]);

        $laundryOwner = LaundryOwner::create($validated);

        return response()->json([
            'status' => 'success',
            'code' => 201,
            'data' => $laundryOwner
        ], 201);
    }

    public function show($id)
    {
        $laundryOwner = LaundryOwner::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $laundryOwner
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $laundryOwner = LaundryOwner::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'laundry_name' => 'sometimes|required',
            'laundry_address' => 'sometimes|required',
            'registration_date' => 'sometimes|required|date',
        ]);

        $laundryOwner->update($validated);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $laundryOwner
        ], 200);
    }

    public function destroy($id)
    {
        $laundryOwner = LaundryOwner::findOrFail($id);
        $laundryOwner->delete();

        return response()->json([
            'status' => 'success',
            'code' => 204,
            'data' => null
        ], 204);
    }
}
