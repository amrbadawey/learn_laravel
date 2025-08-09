<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'club_id', 'sport_type_id'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function sportType()
    {
        return $this->belongsTo(SportType::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class);
    }
}
