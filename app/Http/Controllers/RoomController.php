<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Building;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // READ (List Data + PENCARIAN)
    public function index(Request $request)
    {
        $query = Room::with('building');

        // Jika ada pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            
            // HANYA CARI BERDASARKAN NAMA (Facilities dihapus)
            $query->where('name', 'like', '%' . $search . '%');
        }

        $rooms = $query->latest()->get();

        return view('rooms.index', compact('rooms'));
    }

    // CREATE
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES ADMIN');
        } 
        $buildings = Building::all();
        return view('rooms.create', compact('buildings'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:rooms,name',
            'building_id' => 'required|exists:buildings,id',
            'capacity' => 'required|integer|min:1',
            // 'facilities' dihapus dari validasi
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil ditambahkan');
    }

    // EDIT
    public function edit(Room $room)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES ADMIN');
        }
        $buildings = Building::all();
        return view('rooms.edit', compact('room', 'buildings'));
    }

    // UPDATE
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|unique:rooms,name,' . $room->id,
            'building_id' => 'required|exists:buildings,id',
            'capacity' => 'required|integer|min:1',
            // 'facilities' dihapus dari validasi
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Data ruangan diperbarui');
    }

    // DELETE
    public function destroy(Room $room)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES ADMIN');
        }
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Ruangan dihapus');
    }
}