<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutImage extends Model
{
    public $table = 'aboutimage';

    protected $fillable = ['name','about_id','created_at','updated_at'];

    public function about(){
        return $this->belongsTo('App\About');
    }
}
