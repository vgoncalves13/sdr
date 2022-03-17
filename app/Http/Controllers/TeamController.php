<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamEditRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (!Auth::user()->hasRole(['administrator', 'manager'])){
            return abort('403');
        }
        $teams = Team::all();
        return view('teams.index')->with(compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        if (!Auth::user()->hasRole(['administrator', 'manager'])){
            return abort('403');
        }
        $sectors = DB::table('sectors')->pluck('name','id');
        return view('teams.create')->with(compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        if (!Auth::user()->hasRole(['administrator', 'manager'])){
            return abort('403');
        }
        $team = Team::create($request->all());

        Session::flash('message',__('messages.success',[
            'objeto' => 'Equipe',
            'nome' => $team->name
        ]));
        Session::flash('alert-class', 'alert-success');
        return redirect(route('teams.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Team $team)
    {
        if (!Auth::user()->hasRole(['administrator', 'manager'])){
            return abort('403');
        }
        return view('teams.show')->with(compact('team'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Team $team)
    {
        if (!Auth::user()->hasRole(['administrator', 'manager'])){
            return abort('403');
        }
        $sectors = DB::table('sectors')->pluck('name','id');
        return view('teams.edit')->with(compact('sectors','team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(TeamEditRequest $request, Team $team)
    {
        if (!Auth::user()->hasRole(['administrator', 'manager'])){
            return abort('403');
        }
        $team->update($request->all());
        Session::flash('message',__('messages.update_success',[
            'objeto' => 'Equipe',
            'nome' => $team->name
        ]));
        Session::flash('alert-class', 'alert-success');
        return redirect(route('teams.show',$team));
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
