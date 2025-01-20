<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'name',
        'first_name',
        'address',
        'zip',
        'city',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_active'
    ];

    public $timestamps = true;
    const string CREATED_AT = 'created_at';
    const string UPDATED_AT = 'updated_at';

}
