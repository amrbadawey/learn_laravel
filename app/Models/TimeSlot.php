<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = ['stadium_id', 'day_of_week', 'start_time', 'end_time'];

    public function stadium()
    {
        return $this->belongsTo(Stadium::class);
    }
}
