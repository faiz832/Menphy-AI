<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'symptom_id', 
        'question_text',
        'cf_expert',
        'cf_never',
        'cf_rarely',
        'cf_sometimes',
        'cf_often',
        'cf_very_often'
    ];

    public function symptom()
    {
        return $this->belongsTo(Symptom::class);
    }
}
