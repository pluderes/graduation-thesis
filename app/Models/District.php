<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'district_name', 'type', 'matp'
    ];

    protected $primaryKey = 'maqh';
    protected $table = 'district';
}
