<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    protected $table = 'kondisis';
    protected $fillable = ['nama'];
    public function observasi()
    {
        return $this->belongsTo(Observasi::class, 'observasi_id');
    }

    // public function kondisi()
    // {
    //     return $this->belongsTo(Kondisi::class, 'kondisi_id');
    // }


    public function observasis()
    {
        return $this->belongsToMany(Observasi::class, 'observasi_kondisis')
            ->withPivot('nilai');
    }
}


