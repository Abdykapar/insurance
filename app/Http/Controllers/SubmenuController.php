<?php

namespace App\Http\Controllers;

use App\Danger;
use App\File;
use App\ppType;
use App\Srok1;
use App\Submenu;
use App\Tarif;
use App\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SubmenuController extends Controller
{
    protected $allSub;
    protected $sub;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = 'menuindex';
        $sub = Submenu::all();
        $allSub = Submenu::where('relation',0)->paginate(10);
        return view('admin/submenu/index',compact('sub','allSub','a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = Submenu::all();
        $allSub = Submenu::all();
        return view('admin/submenu/create',compact('sub','allSub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        if ($request['relation'] > 0){
            $s = Submenu::find($request['relation']);
            $level = $s->level + 1;
        }
        else {
            $level = 1;
        }
        $submenu = new Submenu(
          [
              'name' => $request['title'],
              'content' => $request['content'],
              'level' => $level,
              'relation' => $request['relation'] ? $request['relation']:0,
              'nameKg' => $request['titleKg'],
              'contentKg' => $request['contentKg']
          ]
        );
        $submenu->save();
        $submenu->add_file($request,$submenu->id);
        if ($submenu->relation > 0){
            return redirect(route('admin.menu.show',$submenu->relation));
        }
        return redirect(route('admin.menu.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a = 'menu';
        $sub = Submenu::all();
        $menu = Submenu::find($id);
        $f = File::where([['submenu_id',$menu->id],['language','ru']])->get();
        if($f->toJson() == '[]'){
            $file='';
        }
        else {
            $file = $f[0];
        }
        $f1 = $menu->file_table()->where('language','=','kg')->get();
        if($f1->toJson()=='[]'){
            $file1='';
        }
        else {
            $file1 = $f1[0];
        }
        $subsubmenu = Submenu::where('relation','=',$menu->id)->get();
        return view('admin/submenu/show',compact('sub','menu','subsubmenu','a','file','file1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submenu = Submenu::find($id);
        $sub = Submenu::all();
        $f = File::where([['submenu_id',$submenu->id],['language','ru']])->get();
        if($f->toJson() == '[]'){
            $file='';
        }
        else {
            $file = $f[0];
        }
        $f1 = File::where([['submenu_id',$submenu->id],['language','kg']])->get();
        if($f1->toJson() == '[]'){
            $file1='';
        }
        else {
            $file1 = $f1[0];
        }
        return view('admin.submenu.edit',compact('sub','submenu','file','file1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request['relation'] > 0){
            $s = Submenu::find($request['relation']);
            $level = $s->level + 1;
        }
        else {
            $level = 1;
        }

        $submenu = Submenu::find($id);

        $submenu->update([
            'name' => $request['title'],
            'content' => $request['content'],
            'level' => $level,
            'relation' => $request['relation'] ? $request['relation']:0,
            'nameKg' => $request['titleKg'],
            'contentKg' => $request['contentKg']
        ]);
        $submenu->save();
        $file = File::where([['submenu_id',$id],['language','ru']])->take(1)->get();
        if ($file->toJson() != '[]'){
            Storage::delete('files/'.$file[0]->name);
        }
        $file1 = File::where([['submenu_id',$id],['language','kg']])->take(1)->get();
        if ($file1->toJson() != '[]'){
            Storage::delete('/files/'.$file1[0]->name);
        }
        $submenu->add_file($request, $submenu->id);
        return redirect(route('admin.menu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id1 = 0;
        $submenu = Submenu::find($id);
        if ($submenu->relation > 0){
            $id1 = $submenu->relation;
        }
        Submenu::destroy($id);
        if ($id1){
            return redirect(route('admin.menu.show',$id1));
        }
        return redirect(route('admin.menu.index'));
    }

    public function item($id){
        $item = Submenu::find($id);
        $sub = Submenu::all();
        return view('admin/submenu/create/create',compact('sub','item'));
    }

    public function calc(){
        $sub = Submenu::all();
        $e = Tarif::all();
        $elem = Type::all();
        $a = Type::all()->find(1);
        $s = Srok1::all();
        $types = ppType::all();
        $columns = \DB::connection()->getSchemaBuilder()->getColumnListing("type");
        $dangers = Danger::all();
        return view('pages/calculator',compact('sub','e','elem','s','columns','types','dangers'));
    }
}
