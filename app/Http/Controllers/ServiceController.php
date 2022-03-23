<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index')->with(compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $service = Service::create($request->all());

        Session::flash('message',__('messages.success',[
            'objeto' => 'Serviço',
            'nome' => $service->name
        ]));
        Session::flash('alert-class', 'alert-success');

        return redirect(route('services.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     */
    public function show(Service $service)
    {
        return view('services.show')->with(compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     */
    public function edit(Service $service)
    {
        $classifications = Classification::all(['id','display_name']);
        return view('services.edit')->with(compact('service','classifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->update($request->all());
        $service->classifications()->sync($request->classifications);

        Session::flash('message',__('messages.update_success',[
            'objeto' => 'Serviço',
            'nome' => $service->name
        ]));
        Session::flash('alert-class', 'alert-success');

        return redirect(route('services.show',$service));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
