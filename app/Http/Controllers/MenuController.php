<?php

namespace App\Http\Controllers;

use App\About;
use App\Agent;
use App\Contact;
use App\File;
use App\Image;
use App\Menu;
use App\News;
use App\Partner;
use App\Submenu;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    protected $sub;
    public function home(){
        $news = News::all();
        $sub = Submenu::all();
        return view('new',compact('news','sub'));
    }
    public function submenu($id){
        $submenu = Submenu::find($id);
        $subsub = Submenu::where('relation','=',$submenu->id)->get();
//        dd($submenu->toArray());
        if($submenu){
            $f = $submenu->file_table()->where('language','=','ru')->get();

            if($f->toJson() == '[]'){
                $file='';
            }
            else {
                $file = $f[0];
            }


            $f1 = $submenu->file_table()->where('language','=','kg')->get();
            if($f1->toJson() == '[]'){
                $file1='';
            }
            else {
                $file1 = $f1[0];
            }
        }
        else {
            $file='';
            $file1 = '';
        }
        $sub = Submenu::all();

        return view('pages/submenu/index',compact('sub','submenu','subsub','file','file1'));
    }
    public function contact(){
        $element = Contact::all()->first();
        return view('pages/contact',compact('element'));
    }
    public function news(){
        $news = News::all();
        return view('pages/news',compact('news'));
    }
    public function newId($id){
        $new = News::find($id);
        $n = News::all();
        $b = $n->last();
        return view('pages/new',compact('new','b'));
    }
    public function partners(){
        $element = Partner::all()->first();
        $logo = Image::all();
        return view('pages/partners',compact('element','logo'));
    }
    public function feedback(){

        return view('pages/feedback');
    }
    public function about(){
        $element = About::all()->first();
        return view('pages/about',compact('element'));
    }
    public function main1(){
        $new = News::all();
        $news = News::cutted($new);
        return view('welcome',compact('news'));
    }
    public function agent(){
        $agents = Agent::all();
        return view('pages/agent',compact('agents'));
    }
    public function locale($locale){
        if(Session::has('locale'))
        {
            Session::put('locale', Input::get('locale'));
        }
        else
        {
            Session::set('locale', Input::get('locale'));
        }
        return Redirect::back();
    }
}
