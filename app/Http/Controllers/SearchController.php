<?php

namespace App\Http\Controllers;

use App\About;
use App\Agent;
use App\Contact;
use App\Menu;
use App\News;
use App\Partner;
use App\Postanovlenie;
use App\Pravila;
use App\Submenu;
use App\Sv;
use App\Vds;
use App\Zakon;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    protected $sub;
    public function index(Request $request){
        if ($request['search'] == nullOrEmptyString()){
        }
//        $text = News::search($request['search'])->get();
        $search = '%'.$request['search'].'%';
        $word = $request['search'];
        $users = News::
            where('name', 'LIKE', $search)
            ->orwhere('content', 'LIKE', $search)
            ->orwhere('created_at','LIKE',$search)
        ->get();
        $about = About::
            where('name', 'LIKE', $search)
            ->orwhere('content', 'LIKE', $search)
            ->orwhere('created_at','LIKE',$search)
        ->get();
        $agent = Agent::
            where('name', 'LIKE', $search)
            ->orwhere('content', 'LIKE', $search)
            ->orwhere('created_at','LIKE',$search)
        ->get();
        $partner = Partner::
            where('name', 'LIKE', $search)
            ->orwhere('content', 'LIKE', $search)
            ->orwhere('created_at','LIKE',$search)
        ->get();
        $submenu = Submenu::
            where('name', 'LIKE', $search)
            ->orwhere('content', 'LIKE', $search)
            ->orwhere('created_at','LIKE',$search)
        ->get();
        $data = [
          'news' => $users,
            'about' => $about,
            'agent' => $agent,
            'partner' => $partner,
            'submenu' => $submenu
        ];
        $sub = Submenu::all();
        return view('pages/search',compact('word','data','sub'));
    }
}
