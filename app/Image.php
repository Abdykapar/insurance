<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'image';

    protected $fillable = ['name','logo','partner_id','created_at'];

    public static function updateImage($request,$id,$url){
        $imageName = $request->file('image')->getClientOriginalName();
        $path = base_path() . '/public/uploads/partners/';
        $request->file('image')->move($path , $imageName);

        $partner  = Image::find($id);
        $partner->update(
            [
                'name' => 'http://'.$url,
                'logo' => $imageName,
                'partner_id' => 1
            ]
        );
        $partner->save();
    }
}
