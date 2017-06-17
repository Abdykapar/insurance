<?php

namespace App\Http\Controllers;
use App\About;
use App\Submenu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\Translation\Tests\Catalogue\AbstractOperationTest;

class AboutController extends Controller
{
    protected $sub;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = 'about';
        $sub = Submenu::all();
        $about = About::all()->first();
        if ($about == null){
            return redirect(route('admin.about.create'));
        }
        return view('admin/about/index',compact('sub','about','a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = Submenu::all();
        return view('admin/about/create',compact('sub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        About::create([
            'name' => $request['title'],
            'content' => $request['content']
        ])->save();
        return redirect(route('admin.about.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        if ($about == null){
            return redirect(route('admin.about.create'));
        }
        $sub = Submenu::all();
        return view('admin/about/edit',compact('sub','about'));
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
        $about = About::find($id);
        $about->update([
            'name' => $request['title'],
            'content'=>$request['content'],
        ]);
        $about->save();
        return redirect(route('admin.about.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
