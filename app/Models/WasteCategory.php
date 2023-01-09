<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'code', 'description'
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
