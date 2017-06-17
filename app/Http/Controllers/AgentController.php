<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Submenu;
use Illuminate\Http\Request;

use App\Http\Requests;

class AgentController extends Controller
{
    protected $sub;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = 'agent';
        $sub = Submenu::all();
        $agents = Agent::all();
        return view('admin/agent/index',compact('sub','agents','a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = Submenu::all();
        return view('admin/agent/create',compact('sub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Agent::create([
            'name' => $request['title'],
            'content' => $request['content']
        ])->save();
        return redirect(route('admin.agent.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = Agent::find($id);
        $sub = Submenu::all();
        return view('admin/agent/show',compact('sub','agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::find($id);
        $sub = Submenu::all();
        return view('admin/agent/edit',compact('sub','agent'));
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
        $agent = Agent::find($id);
        $agent->update([
            'name' => $request['title'],
            'content' => $request['content']
        ]);
        $agent->save();
        return redirect(route('admin.agent.show',$agent->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agent::destroy($id);
        return redirect(route('admin.agent.index'));
    }
}
