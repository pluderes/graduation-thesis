<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'username', 'password', 'acc_name', 'acc_email', 'acc_contact', 'acc_img', 'perm_id'
    ];

    protected $primaryKey = 'acc_id';
    protected $table = 'account';
}
