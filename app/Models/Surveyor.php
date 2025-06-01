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
}
