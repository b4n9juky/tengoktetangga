<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observasi extends Model
{
    public function kondisis()
    {
        return $this->belongsToMany(Kondisi::class, 'observasi_kondisi')
            ->withPivot('nilai')
            ->withTimestamps();
    }
}
