<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['mental_disorder_id', 'question_text'];

    public function mentalDisorder()
    {
        return $this->belongsTo(MentalDisorder::class);
    }
}
