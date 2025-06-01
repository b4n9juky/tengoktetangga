<?php

namespace App\Models;

use App\Models\AnggotaTimKegiatan;

use Illuminate\Database\Eloquent\Model;

class TimKegiatan extends Model
{
    protected $fillable = [
        'kegiatan_id',
        'nama_tim',
        'ketua_id'
    ];
    public function anggotaTimKegiatan()
    {
        return $this->hasMany(AnggotaTimKegiatan::class);
    }
}
