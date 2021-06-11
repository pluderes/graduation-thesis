<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'cate_name', 'cate_desc'
    ];

    protected $primaryKey = 'cate_id';
    protected $table = 'category';
}
