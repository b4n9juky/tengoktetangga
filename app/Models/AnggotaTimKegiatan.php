<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaTimKegiatan extends Model
{
    protected $fillable = ['tim_kegiatan_id', 'user_id', 'tugas'];
}
