<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;

class RoomApiController extends Controller
{
    // Syarat: API REST API (GET only)
    public function index()
    {
        $rooms = Room::all();
        return response()->json([
            'status' => 'success',
            'data' => $rooms
        ], 200);
    }

    // Get specific data
    public function show($id)
    {
        $room = Room::find($id);
        if(!$room) {
            return response()->json(['status' => 'error', 'message' => 'Not Found'], 404);
        }
        return response()->json(['status' => 'success', 'data' => $room], 200);
    }
}