<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectorRequest;
use App\Models\Sector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectors = Sector::paginate(10);
        return view('sectors.index')->with(compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Redirector
     */
    public function store(SectorRequest $request)
    {
        $sector = Sector::create($request->all());
        Session::flash('message',__('messages.success',[
            'objeto' => 'Setor',
            'nome' => $sector->name
        ]));
        Session::flash('alert-class', 'alert-success');

        return redirect(route('sectors.show',$sector));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return View
     */
    public function show(Sector $sector)
    {
        return view('sectors.show')->with(compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sector)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        //
    }
}
