<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryDays extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subService()
    {
        return $this->belongsTo(SubService::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'delivery_id');
    }
}
