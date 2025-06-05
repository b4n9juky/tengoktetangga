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


    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class, 'observasi_id');
    }
    public function surveyor()
    {
        return $this->belongsTo(Surveyor::class);
    }
    public function kondisi()
    {
        return $this->belongsToMany(
            Kondisi::class,
            'observasi_kondisis',
            'observasi_id',
            'kondisi_id'
        )
            ->withPivot('nilai');
    }
    public function observasiKondisi()
    {
        return $this->hasMany(ObservasiKondisi::class);
    }


    // public function kondisis()
    // {
    //     return $this->belongsToMany(
    //         Kondisi::class,          // Model terkait
    //         'observasi_kondisis',    // Nama tabel pivot
    //         'observasi_id',          // Foreign key di pivot untuk model Observasi
    //         'kondisi_id'             // Foreign key di pivot untuk model Kondisi
    //     );

}
