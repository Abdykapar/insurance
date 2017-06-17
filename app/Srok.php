<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Srok extends Model
{
    public $table = 'srok';
    protected $fillable = ['name','size'];
}
