<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{



    protected $fillable = [
        'surveyor_id',
        'question_id',
        'answer_text',
    ];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function surveyor()
    {
        return $this->belongsTo(Surveyor::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }
}
