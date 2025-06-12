<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    protected $table = 'kondisis';
    protected $fillable = ['nama'];
    public $timestamps = true;


    public function observasi()
    {
        return $this->belongsToMany(
            Observasi::class,
            'observasi_kondisis',
            'kondisi_id',
            'observasi_id'
        )
            ->withPivot('nilai');
    }
    public function observasiKondisi()
    {
        return $this->hasMany(ObservasiKondisi::class);
    }
    // public function observasis()
    // {
    //     return $this->belongsToMany(
    //         Observasi::class,
    //         'observasi_kondisis',
    //         'kondisi_id',
    //         'observasi_id'
    //     );
    // }



}
