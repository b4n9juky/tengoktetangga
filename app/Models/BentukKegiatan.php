<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BentukKegiatan extends Model
{

    protected $fillable = [
        'nama_bentuk',
        'deskripsi',
        'created_by',
        'is_approved'
    ];
}
