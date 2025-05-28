<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $table = 'questions';
    protected $fillable = ['text', 'type', 'bobot', 'kategori_id'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    // relasi model Question dengan model Answer
    public function kategori()
    {
        return $this->belongsTo(KategoriSurvey::class, 'kategori_id');
    }
    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
