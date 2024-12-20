<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'mental_disorder_id', 'cf', 'is_recovered'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mentalDisorder()
    {
        return $this->belongsTo(MentalDisorder::class);
    }

    public function recommendation()
    {
        return $this->hasOne(Recommendation::class);
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }
}
