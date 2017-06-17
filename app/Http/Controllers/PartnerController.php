<?php

namespace App\Http\Controllers;

use App\Image;
use App\Partner;
use App\Submenu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    protected $sub;
    public function index()
    {
        $ab = 'partners';
        $a = Partner::all();
        $logo = Image::all();
        $sub = Submenu::all();
        return view('admin/partners/index',compact('sub','a','logo','ab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = Submenu::all();
        return view('admin/partners/create',compact('sub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Partner::create([
           'name' => $request['title'],
           'content' => $request['content']
       ])->save();
        return redirect(route('admin.partners.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::find($id);
        $sub = Submenu::all();
        return view('admin/partners/show',compact('sub','partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::find($id);
        $sub = Submenu::all();
        return view('admin/partners/edit',compact('sub','partner'));
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
        $partner = Partner::find($id);
        $partner->update(
            [
                'name' => $request['title'],
                'content' => $request['content']
            ]
        );
        $partner->save();
        return redirect(route('admin.partners.show',$partner->id));
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
