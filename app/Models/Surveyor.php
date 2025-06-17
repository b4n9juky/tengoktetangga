<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surveyor extends Model
{
    protected $fillable = ['user_id', 'nama', 'kelas', 'alamat', 'no_hp'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function getSkorTemaAttribute()
    {
        $skorTema = [];

        foreach ($this->answers as $answer) {
            $tema = $answer->question->tema->nama_tema ?? 'Tanpa Tema';

            foreach ($answer->choices as $choice) {
                if (!isset($skorTema[$tema])) {
                    $skorTema[$tema] = 0;
                }

                $skorTema[$tema] += $choice->bobot;
            }
        }

        return $skorTema;
    }
}
