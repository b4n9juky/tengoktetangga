<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kondisi extends Model
{
    public function observasis()
    {
        return $this->belongsToMany(Observasi::class, 'observasi_kondisi')
            ->withPivot('nilai')
            ->withTimestamps();
    }
}
