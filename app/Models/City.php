<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'province_name', 'type'
    ];

    protected $primaryKey = 'matp';
    protected $table = 'province_city';
}
