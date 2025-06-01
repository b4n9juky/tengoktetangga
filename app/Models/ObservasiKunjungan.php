<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObservasiKunjungan extends Model
{
    protected $table = 'observasi_kunjungans';
    protected $fillable = [
        'surveyor_id',
        'tanggal_kunjungan',
        'nama_tetangga',
        'alamat',
        'kondisi_teramati',
        'bentuk_interaksi',
        'catatan_tambahan',
    ];
    public function dokumentasis()
    {
        return $this->hasMany(Dokumentasi::class);
    }
    public function surveyor()
    {
        return $this->belongsTo(Surveyor::class);
    }
}
