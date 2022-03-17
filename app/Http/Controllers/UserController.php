<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Models\People;
use App\Models\Team;
use App\Models\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $managers = User::with('people')->whereRoleIs('manager')->get()->pluck('people.name', 'id');
        $teams = Team::get()->pluck('name','id');
        //$sectors = DB::table('sectors')->pluck('name','id');
        $roles = DB::table('roles')->pluck('display_name','id');

        return view('users.create')->with(compact('roles','managers','teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(UserRequest $request)
    {
        $request->request->add(['password' => bcrypt($request->password)]);
        $user = User::create($request->all());
        $people = People::create($request->all());
        $user->people()->save($people);
        $user->attachRole($request->role);

        Session::flash('message',__('messages.success',[
            'objeto' => 'Usuário',
            'nome' => $user->name
        ]));
        Session::flash('alert-class', 'alert-success');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(User $user)
    {
        return view('users.show')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(User $user)
    {
        $managers = User::with('people')->whereRoleIs('manager')->get()->pluck('people.name', 'id');
        //$sectors = DB::table('sectors')->pluck('name','id');
        $teams = Team::get()->pluck('name','id');
        $roles = DB::table('roles')->pluck('display_name','id');

        return view('users.edit')->with(compact('user','managers','teams','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(UserEditRequest $request, User $user)
    {
        $user->login = $request->login;
        $user->save();

        $user->people->name = $request->name;
        $user->people->email = $request->email;
        //$user->people->sector_id = $request->sector_id;
        DB::table('role_user')->where('user_id',$user->id)->update(['team_id' => $request->team_id]);
        $user->people->manager_id = $request->manager_id;
        $user->people->UF = $request->UF;
        $user->people->telephone = $request->telephone;
        $user->people->save();

        $user->attachRole($request->role_id);

        Session::flash('message',__('messages.update_success',[
            'objeto' => 'Usuário',
            'nome' => $user->people->name
        ]));
        Session::flash('alert-class', 'alert-success');

        return redirect(route('users.show', $user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }
}
