<?php

namespace App\Models;

use App\Models\TimKegiatan;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{

    protected $fillable = [
        'judul',
        'deskripsi',
        'lokasi',
        'waktu_mulai',
        'waktu_selesai',
        'bentuk_id',
        'dibuat_oleh',
        'pembina_id',
        'koordinator_id',
        'status',
        'evaluasi'

    ];

    public function timKegiatan()
    {
        return $this->hasOne(TimKegiatan::class);
    }
    public function evaluasis()
    {
        return $this->hasMany(Evaluasi::class);
    }
}
