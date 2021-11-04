<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\People;
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
        $sectors = DB::table('sectors')->pluck('name','id');
        $roles = DB::table('roles')->pluck('display_name','id');
        return view('users.create')->with(compact('sectors','roles'));
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
