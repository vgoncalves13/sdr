<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassificationRequest;
use App\Models\Classification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classifications = Classification::all();
        return view('classifications.index')->with(compact('classifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        if(!Auth::user()->hasRole(['administrator','manager'])){
            return abort(403);
        }
        return view('classifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(ClassificationRequest $request)
    {
        $classification = Classification::create($request->all());

        Session::flash('message',__('messages.success',[
            'objeto' => 'Classificação',
            'nome' => $classification->name
        ]));
        Session::flash('alert-class', 'alert-success');

        return redirect(route('classifications.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classification  $classification
     */
    public function show(Classification $classification)
    {
        return view('classifications.show')->with(compact('classification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classification  $classification
     */
    public function edit(Classification $classification)
    {
        return view('classifications.edit')->with(compact('classification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classification  $classification
     */
    public function update(Request $request, Classification $classification)
    {
        $classification->update($request->all());

        Session::flash('message',__('messages.update_success',[
            'objeto' => 'Classificação',
            'nome' => $classification->name
        ]));
        Session::flash('alert-class', 'alert-success');

        return redirect(route('classifications.show',$classification));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classification $classification)
    {
        //
    }
}
