<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriSurvey extends Model
{
    protected $fillable = ['nama_kategori', 'deskripsi'];

    public function pertanyaan()
    {
        return $this->hasMany(Question::class, 'kategori_id');
    }
}
