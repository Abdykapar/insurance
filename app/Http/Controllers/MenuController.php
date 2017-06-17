<?php

namespace App\Http\Controllers;

use App\About;
use App\Agent;
use App\Contact;
use App\Image;
use App\Menu;
use App\News;
use App\Partner;
use App\Submenu;
use Illuminate\Http\Request;

use App\Http\Requests;

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
        $sub = Submenu::all();
        $subsub = Submenu::where('relation','=',$submenu->id)->get();
        return view('pages/submenu/index',compact('sub','submenu','subsub'));
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
}
