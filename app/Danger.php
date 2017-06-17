<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Danger extends Model
{
    protected $fillable = ['name','minLimit'];

    public $table = 'danger';
}
