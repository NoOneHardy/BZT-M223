<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'car';

    protected $fillable = [
        'name',
        'brand',
        'price',
        'fuel_type',
        'color',
        'type',
        'tank',
        'manufacturing_date',
        'created_at',
        'updated_at',
        'is_active'
    ];

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
