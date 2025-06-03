<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observasi extends Model
{
    protected $table = 'observasis';
    protected $fillable = [
        'surveyor_id',
        'tanggal_kunjungan',
        'nama_tetangga',
        'alamat',
        'kondisi_teramati',
        'bentuk_interaksi',
        'catatan_tambahan',
    ];
    public function kondisi()
    {
        return $this->hasMany(Kondisi::class, 'observasi_id');
    }

    public function dokumentasis()
    {
        return $this->hasMany(Dokumentasi::class, 'observasikunjungan_id');
    }
    public function surveyor()
    {
        return $this->belongsTo(Surveyor::class);
    }
    public function observasikondisi()
    {
        return $this->belongsToMany(Kondisi::class, 'observasi_kondisi')
            ->withPivot('nilai');
    }
}
