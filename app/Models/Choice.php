<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $table = 'choices';
    protected $fillable = ['question_id', 'text', 'bobot'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'answer_choice');
    }
}
