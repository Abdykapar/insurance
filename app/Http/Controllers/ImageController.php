<?php

namespace App\Http\Controllers;

use App\Image;
use App\Partner;
use App\Submenu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    protected $sub;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Partner::all();
        $logo = Image::all();
        $sub = Submenu::all();
        return view('admin/partners/index',compact('sub','a','logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = Submenu::all();
        return view('admin/partners/image/create',compact('sub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = $request->file('image')->getClientOriginalName();
        $path = base_path() . '/public/uploads/partners/';
        $request->file('image')->move($path , $imageName);

        $partner  = Image::create(
            [
                'name' => 'http://'.$request['url'],
                'logo' => $imageName,
                'partner_id' => 1
            ]
        );
        $partner->save();
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
        $partner = Image::find($id);
        $sub = Submenu::all();
        return view('admin/partners/image/show',compact('sub','partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Image::find($id);
        $sub = Submenu::all();
        return view('admin/partners/image/edit',compact('sub','partner'));
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
        if (isset($request['image'])){
            Image::updateImage($request,$id, $request['url']);
        } else {
            $image = Image::find($id);
            $image->name = $request['url'];
            $image->save();
        }
        session()->put('success','Image updated');
        return redirect(route('admin.partners.image.show',$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Image::find($id)->delete();
        return redirect(route('admin.partners.index'));
    }
}
