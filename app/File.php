<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $table = 'files';
    protected $fillable = ['id','name','original_name','submenu_id','language'];

    public function submenu(){
        return $this->belongsTo('App\Submenu');
    }
}
