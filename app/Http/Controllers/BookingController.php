<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $bookings = Booking::with(['room', 'user'])
                               ->orderByRaw("FIELD(status, 'pending', 'approved', 'rejected')")
                               ->orderBy('created_at', 'desc')
                               ->get();
        } else {
            $bookings = Booking::where('user_id', Auth::id())
                               ->with('room')
                               ->orderBy('created_at', 'desc')
                               ->get();
        }

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('bookings.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
            'purpose' => 'required|string|max:255',
        ]);

        $isBooked = Booking::where('room_id', $request->room_id)
            ->where('status', '!=', 'rejected')
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                      ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })->exists();

        if ($isBooked) {
            return back()->withErrors(['room_id' => 'Ruangan sudah dipooking pada jam tersebut!']);
        }

        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'purpose' => $request->purpose,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.index')->with('success', 'Pengajuan berhasil dikirim!');
    }

    public function approve(Booking $booking)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $booking->update(['status' => 'approved']);
        return back()->with('success', 'Pengajuan berhasil DISETUJUI.');
    }

    public function reject(Booking $booking)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $booking->update(['status' => 'rejected']);
        return back()->with('success', 'Pengajuan telah DITOLAK.');
    }

    public function dailySchedule()
    {
        $bookings = Booking::with(['room', 'user'])
                        ->where('status', 'approved')
                        ->whereDate('start_time', now())
                        ->orderBy('start_time', 'asc')
                        ->get();

        return view('bookings.daily', compact('bookings'));
    }

    public function ticket(Booking $booking)
    {
        if (auth()->user()->role !== 'admin' && $booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($booking->status !== 'approved') {
            return back()->with('error', 'Tiket hanya tersedia untuk peminjaman yang disetujui.');
        }

        return view('bookings.ticket', compact('booking'));
    }
}