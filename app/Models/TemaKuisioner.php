<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class TemaKuisioner extends Model
{
    protected $table = 'tema_quisioners';
    protected $fillable = ['nama_tema', 'deskripsi'];

    public function questions()
    {
        return $this->hasMany(Question::class, 'tema_id');
    }
}
