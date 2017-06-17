<?php

namespace App\Http\Controllers;

use App\Danger;
use App\ppType;
use App\Srok1;
use App\Submenu;
use App\Tarif;
use App\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $allSub = Submenu::paginate(10);
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
        $submenu = Submenu::create(
          [
              'name' => $request['title'],
              'content' => $request['content'],
              'level' => $level,
              'relation' => $request['relation'] ? $request['relation']:0
          ]
        );
        $submenu->save();
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
        $subsubmenu = Submenu::where('relation','=',$menu->id)->get();
        return view('admin/submenu/show',compact('sub','menu','subsubmenu','a'));
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
        return view('admin.submenu.edit',compact('sub','submenu'));
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
            'relation' => $request['relation'] ? $request['relation']:0
        ]);
        $submenu->save();
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
