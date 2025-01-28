<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubService extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function subServiceTemplates()
    {
        return $this->hasMany(SubServiceTemplate::class);
    }

    public function deliveryDates()
    {
        return $this->hasMany(DeliveryDays::class, 'sub_service_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'package_id');
    }
}
