<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $table = 'type';
    protected $fillable = ['name','2,5','5','7,5','10','12,5','15','17,5','20','21'];
}
