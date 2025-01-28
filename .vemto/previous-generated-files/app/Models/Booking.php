<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function deliveryDays()
    {
        return $this->belongsTo(DeliveryDays::class, 'delivery_id');
    }

    public function subService()
    {
        return $this->belongsTo(SubService::class, 'package_id');
    }

    public function subServiceTemplate()
    {
        return $this->belongsTo(SubServiceTemplate::class, 'template_id');
    }
}
