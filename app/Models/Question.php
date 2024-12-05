<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['symptom_id', 'question_text', 'cf_expert'];

    public function symptom()
    {
        return $this->belongsTo(Symptom::class);
    }
}
