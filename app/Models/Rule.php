<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = ['mental_disorder_id', 'condition', 'cf'];

    public function mentalDisorder()
    {
        return $this->belongsTo(MentalDisorder::class);
    }
}
