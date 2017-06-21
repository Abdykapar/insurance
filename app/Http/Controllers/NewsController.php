<?php

namespace App\Http\Controllers;

use App\News;
use App\Submenu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected $sub;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = 'news';
        $news = News::all();
        $sub = Submenu::all();
        return view('admin/news/index',compact('sub','news','a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = Submenu::all();
        return view('Admin/news/create',compact('sub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        News::create([
            'name' => $request['title'],
            'content' => $request['content'],
            'nameKg' => $request['titleKg'],
            'contentKg' => $request['contentKg']
        ])->save();
        return redirect(route('admin.news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $new = News::find($id);
        $sub = Submenu::all();
        return view('admin/news/show',compact('sub','new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = Submenu::all();
        $new = News::find($id);
        return view('admin/news/edit',compact('sub','new'));
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
        $new = News::find($id);
        $new->update([
            'name' => $request['title'],
            'content' => $request['content'],
            'nameKg' => $request['titleKg'],
            'contentKg' => $request['contentKg']
        ]);
        $new->save();
        return redirect(route('admin.news.show',$new->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        return redirect(route('admin.news.index'));
    }
}
