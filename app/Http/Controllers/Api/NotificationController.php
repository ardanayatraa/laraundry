<?php

namespace App\Http\Controllers\Api;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('user')->get();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $notifications
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required',
            'status' => 'required',
        ]);

        $notification = Notification::create($validated);

        return response()->json([
            'status' => 'success',
            'code' => 201,
            'data' => $notification
        ], 201);
    }

    public function show($id)
    {
        $notification = Notification::with('user')->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $notification
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'message' => 'sometimes|required',
            'status' => 'sometimes|required',
        ]);

        $notification->update($validated);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $notification
        ], 200);
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return response()->json([
            'status' => 'success',
            'code' => 204,
            'data' => null
        ], 204);
    }
}
