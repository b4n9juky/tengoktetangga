<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $table = 'questions';
    protected $fillable = ['text', 'type', 'tema_id'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    // relasi model Question dengan model Answer
    public function tema()
    {
        return $this->belongsTo(TemaKuisioner::class, 'tema_id');
    }
    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
