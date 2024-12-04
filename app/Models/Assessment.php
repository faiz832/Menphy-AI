<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'assessment_date', 'recovery_percentage'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
