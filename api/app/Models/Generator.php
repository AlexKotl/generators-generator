<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generator extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'rating'];


    public function generatorSteps()
    {
        return $this->hasMany('App\Models\GeneratorStep', 'generator_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
