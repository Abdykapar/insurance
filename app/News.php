<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $table = 'news';

    protected $fillable = ['name','content','nameKg','contentKg'];
}
