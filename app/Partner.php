<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $table = 'partner';

    protected $fillable = ['name','content','created_at','nameKg','contentKg'];
}
