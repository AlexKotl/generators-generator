<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratorStep extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['generator_id'];

    public function generatorStepItems()
    {
        return $this->hasMany('App\Models\GeneratorStepItem', 'generator_step_id', 'id');
    }
}
