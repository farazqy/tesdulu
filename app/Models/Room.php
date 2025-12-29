<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'name',
        'capacity',
        'is_available',
        'facilities'
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getCurrentStatusAttribute()
    {
        if ($this->is_available == 0) {
            return 'maintenance';
        }

        $isBooked = $this->bookings()
            ->where('status', 'approved')
            ->where(function ($query) {
                $now = now();
                $query->where('start_time', '<=', $now)
                      ->where('end_time', '>=', $now);
            })
            ->exists();

        if ($isBooked) {
            return 'used';
        }

        return 'available';
    }
}