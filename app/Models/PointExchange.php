<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointExchange extends Model
{
    use HasFactory;

    const PROCESS = '0';
    const SENT = '1';
    const ACCEPT = '2';
    const REJECT = '3';

    protected $fillable = [
        'client_id',
        'item_point_id',
        'point_price',
        'recipient',
        'address',
        'postal_code',
        'status',
        'accepted',
    ];

    public function itemPoint()
    {
        return $this->belongsTo(ItemPoint::class, 'item_point_id', 'id');
    }
}
