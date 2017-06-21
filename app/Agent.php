<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public $table = 'agent';

    protected $fillable = ['name','content','nameKg','contentKg'];
}
