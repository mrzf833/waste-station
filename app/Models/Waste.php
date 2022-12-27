<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    const VALUABLE = '0';
    const WORTHLESS = '1';
    use HasFactory;

    protected $fillable = [
        'name',
        'point',
        'type',
    ];
    

    public function images()
    {
        return $this->hasMany(Image::class, 'foreign_id', 'id')->where('model', 'Waste');
    }
}
