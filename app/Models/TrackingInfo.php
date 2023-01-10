<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingInfo extends Model
{
    use HasFactory;

    protected $fillable=["status_code",	"description",	"description_ar", "order_id", "created_at"];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
