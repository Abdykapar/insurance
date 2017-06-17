<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ppType extends Model
{
    protected $fillable = ['name','description'];
    public $table = 'pptype';
}
