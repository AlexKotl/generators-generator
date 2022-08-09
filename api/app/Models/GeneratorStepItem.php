<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratorStepItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['generator_step_id', 'title'];
    protected $hidden = ['order', 'flag', 'generator_step_id'];
}
