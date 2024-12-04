<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = ['diagnosis_id', 'recommendation_text'];

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class);
    }
}
