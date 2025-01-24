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

    public function deliveryDates()
    {
        return $this->hasMany(DeliveryDays::class);
    }

    public function subServiceTemplates()
    {
        return $this->hasMany(SubServiceTemplate::class);
    }
}
