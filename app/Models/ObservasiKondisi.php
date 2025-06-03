<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObservasiKondisi extends Model
{
    protected $table = 'observasi_kondisis';
    protected $fillable = ['observasi_id', 'kondisi_id', 'nilai'];
}
