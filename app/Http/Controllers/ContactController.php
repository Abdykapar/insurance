<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Submenu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    protected $sub;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = 'contact';
        $sub = Submenu::all();
        $contact = Contact::all()->first();
        return view('admin/contact/index',compact('sub','contact','a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = Submenu::all();
        return view('admin/contact/create',compact('sub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Contact::create([
            'name' => $request['title'],
            'content' => $request['content'],
            'nameKg' => $request['titleKg'],
            'contentKg' => $request['contentKg']
        ])->save();
        return redirect(route('admin.contact.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a = 'contact';
        $sub = Submenu::all();
        $contact = Contact::find($id);
        return view('admin/contact/index',compact('sub','contact','a'));
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
        $contact = Contact::find($id);
        return view('admin/contact/edit',compact('sub','contact'));
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
        $contact = Contact::find($id);
        $contact->update([
            'name' => $request['title'],
            'content' => $request['content'],
            'nameKg' => $request['titleKg'],
            'contentKg' => $request['contentKg']
        ]);
        $contact->save();
        return redirect(route('admin.contact.show',$contact->id));
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
