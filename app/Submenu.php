<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    public $table = 'submenu';

    protected $fillable = ['name','content','level','relation'];
}
