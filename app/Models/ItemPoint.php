<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'point',
        'image',
        'description1',
        'description2',
        'stock'
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            function($value){
                return 'storage' . str_replace('public', '', $value);
            }
        );
    }
}
