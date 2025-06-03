<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skoring extends Model
{
    protected $table = 'skoring_kuisioners';
    protected $fillable = ['nilai_awal', 'nilai_akhir', 'keterangan'];
}
