<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemaKuisioner extends Model
{
    protected $table = 'tema_quisioners';
    protected $fillable = ['nama_tema', 'deskripsi'];

    public function pertanyaan()
    {
        return $this->hasMany(Question::class, 'tema_id');
    }
}
