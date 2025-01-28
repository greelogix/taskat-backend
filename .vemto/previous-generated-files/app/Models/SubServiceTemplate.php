<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubServiceTemplate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subService()
    {
        return $this->belongsTo(SubService::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'template_id');
    }
}
