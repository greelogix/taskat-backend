<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title', 'description', 'image'];

    public function subServices()
    {
        return $this->hasMany(SubService::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
