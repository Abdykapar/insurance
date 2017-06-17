<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Submenu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Mail\Mailer;

class FeedbackController extends Controller
{
    protected $sub;
    public function index(){
        $feedbacks = Feedback::all()->sortByDesc('created_at');
        $a = 'feedback';
        $sub = Submenu::all();
        return view('admin/feedback/index',compact('sub','feedbacks','a'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'subject' => 'min:3',
            'text' => 'min:10'
        ]);
        Feedback::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'subject' => $request['subject'],
            'content' => $request['text']
        ])->save();
        $data = [
            'email' => $request['email'],
            'subject' => $request['subject'],
            'text' => $request['text']
        ];
        Session::flash('success','Your message is sent!');

        return redirect(route('feedback'));
    }

    public function show($id){
        $feedback = Feedback::find($id);
        $sub = Submenu::all();
        return view('admin/feedback/show',compact('sub','feedback'));
    }

    public function destroy($id){
        Feedback::destroy($id);
        return redirect(route('admin.feedback.index'));
    }
}
