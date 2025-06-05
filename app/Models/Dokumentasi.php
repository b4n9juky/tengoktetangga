<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi';
    protected $fillable = ['observasikunjungan_id', 'file_path'];


    public function observasi()
    {
        return $this->belongsTo(Observasi::class);
    }
}
