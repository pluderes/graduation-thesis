<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'acc_id', 'deli_id','payment_id','invoice_total','current_status','invoice_date_time'
    ];

    protected $primaryKey = 'invoice_id';
    protected $table = 'invoice';
}
