<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class Submenu extends Model
{
    public $table = 'submenu';

    protected $fillable = ['name','content','level','relation','nameKg','contentKg'];

    public function file_table(){
        return $this->hasMany('App\File');
    }

    public function add_file(Request $request, $id){

            if ($request->hasFile('file')) {
                $destinationPath = 'files'; // upload path
                $extension = $request->file('file')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $request->file('file')->move($destinationPath, $fileName); // uploading file to given path'
                $check = File::where([['submenu_id',$id],['language','ru']])->get();
                if ($check->toJson() != '[]') {
                    $file = File::find($check[0]->id);
                    $file->update([
                        'name' => $fileName,
                        'original_name' => $request->file('file')->getClientOriginalName(),
                        'submenu_id' => $id,
                        'language' => 'ru'
                    ]);
                } else {
                    $file = File::create(
                        [
                            'name' => $fileName,
                            'original_name' => $request->file('file')->getClientOriginalName(),
                            'submenu_id' => $id,
                            'language' => 'ru'
                        ]
                    );
                }
                $file->save();
            }
                if ($request->hasFile('file1')) {
                    $destinationPath = 'files'; // upload path
                    $extension = $request->file('file1')->getClientOriginalExtension(); // getting image extension
                    $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                    $request->file('file1')->move($destinationPath, $fileName); // uploading file to given path'
                    $check = File::where([['submenu_id',$id],['language','kg']])->get();
                    if ($check->toJson() != '[]') {
                        $file1 = File::find($check[0]->id);
                        $file1->update([
                            'name' => $fileName,
                            'original_name' => $request->file('file1')->getClientOriginalName(),
                            'submenu_id' => $id,
                            'language' => 'kg'
                        ]);
                    } else {
                        $file1 = File::create(
                            [
                                'name' => $fileName,
                                'original_name' => $request->file('file1')->getClientOriginalName(),
                                'submenu_id' => $id,
                                'language' => 'kg'
                            ]
                        );
                    }

                $file1->save();
            }
                Session::flash('success', 'Upload successfully');
        }
}
