<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'date',
        'start_time',
        'end_time',
        'full_name',
        'whatsapp',
        'organization_id',
        'organisation',
        'email',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}