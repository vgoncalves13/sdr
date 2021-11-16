<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoverageSourceRequest;
use App\Http\Requests\CoverageSourceStoreRequest;
use App\Http\Requests\CoverageSourceUpdateRequest;
use App\Models\Carrier;
use App\Models\CoverageSource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarrierController extends Controller
{
    protected $coverage_source;

    public function __construct(CoverageSource $coverage_source)
    {
        $this->coverage_source = $coverage_source;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carriers = Carrier::paginate(10);
        return view('carriers.index')->with(compact('carriers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carriers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|unique:carriers'
        ]);

        $carrier = Carrier::create($request->all());
        Session::flash('message',__('messages.success',[
            'objeto' => 'Operadora',
            'nome' => $carrier->name
        ]));
        Session::flash('alert-class', 'alert-success');

        return redirect(route('carriers.show',$carrier));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrier  $carrier
     */
    public function show(Carrier $carrier)
    {
        return view('carriers.show')->with(compact('carrier'));
    }

    public function create_source(Carrier $carrier)
    {
        return view('carriers.create_source')->with(compact('carrier'));
    }

    public function edit_source(CoverageSource $source)
    {
        return view('carriers.edit_source')->with(compact('source'));
    }

    public function store_source(CoverageSourceStoreRequest $request, Carrier $carrier)
    {
        $source = new CoverageSource();
        $source->carrier()->associate($carrier);
        $source->table_name = $request->table_name;
        $source->postal_code_field = $request->postal_code_field;
        $source->number_field = $request->number_field;

        $status = $this->coverage_source->checkStatus($source);

        if (!$status){
            Session::flash('message',__('messages.error'));
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
        $source->save();
        Session::flash('message',__('messages.success',[
            'objeto' => 'Fonte de dados para operadora ',
            'nome' => $carrier->name
        ]));
        Session::flash('alert-class', 'alert-success');

        return redirect(route('carriers.show',$carrier));
    }
    public function update_source(CoverageSourceUpdateRequest $request, CoverageSource $source)
    {
        Session::flash('message',__('messages.update_success',[
            'objeto' => 'Fonte de dados para operadora ',
            'nome' => $source->carrier->name
        ]));
        Session::flash('alert-class', 'alert-success');

        $source->table_name = $request->table_name;
        $source->postal_code_field = $request->postal_code_field;
        $source->number_field = $request->number_field;
        $source->update();

        return redirect(route('carriers.show',$source->carrier));
    }
}
