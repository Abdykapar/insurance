<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    public $table = 'tarif';
    protected $fillable = ['name','min_tarif','rate'];
}
