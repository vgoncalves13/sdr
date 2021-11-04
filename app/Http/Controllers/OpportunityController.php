<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpportunityComplementRequest;
use App\Http\Requests\OpportunityCreateRequest;
use App\Http\Requests\OpportunityStoreRequest;
use App\Models\Address;
use App\Models\COMPANIES_LEAD;
use App\Models\Company;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OpportunityController extends Controller
{

    protected $companies_lead;

    public function __construct()
    {
        $this->companies_lead = new COMPANIES_LEAD();
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $opportunities = Opportunity::with(['company.address'])->paginate(10);
        return view('opportunies.index')->with(compact('opportunities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opportunies.create');
    }

    /**
     * Verify if exists opportunity and redirect form for complement informations.
     *
     */
    public function verify(OpportunityCreateRequest $request)
    {
        $company = Company::with(['opportunities','address','telephones'])->where('cnpj',$request->cnpj)->first();
        if ($company==null){
            $external_company = $this->companies_lead->getCnpj($request->cnpj);
            if ($external_company == null){
                \session()->put('cnpj',$request->cnpj);
                Session::flash('message','Nenhuma empresa encontrada, favor inserir as informações!');
                Session::flash('alert-class', 'alert-warning');
                return view('opportunies.create_data');
            }else{
                return view('opportunies.complement_data')->with(compact('external_company'));
            }
        }
        return view('opportunies.create_opportunity')->with(compact('company'));
    }

    /**
     * Insert new company and complement with data inserted by salesmen
     *
     */
    public function storeAndComplement(OpportunityComplementRequest $request)
    {
        $telephones = $request->telephone;
        $telephone_data = [];
        foreach ($telephones as $key => $value) {
            $telephone_data[$key] = $value;
            $telephone_data[$key]['type'] = 'fixo';
        }
        $cellphones = $request->cellphone;
        $cellphone_data = [];
        foreach ($cellphones as $key => $value) {
            $cellphone_data[$key] = $value;
            $cellphone_data[$key]['type'] = 'celular';
        }
        $company = Company::create($request->all());
        $company->address()->create($request->all());
        $company->opportunity()->create($request->all());
        $company->telephones()->createMany($telephone_data);
        $company->telephones()->createMany($cellphone_data);

        Session::flash('message',__('messages.success',[
            'objeto' => 'Oportunidade',
            'nome' => ''
        ]));
        Session::flash('alert-class', 'alert-success');
        return redirect(route('opportunities.index'));

    }

    /**
     * Store a new opportunity to an existing Company
     *
     */
    public function store(OpportunityStoreRequest $request, Company $company = null)
    {
        $company->opportunities()->create($request->all());

        Session::flash('message',__('messages.success',[
            'objeto' => 'Oportunidade',
            'nome' => ''
        ]));
        Session::flash('alert-class', 'alert-success');
        return redirect(route('opportunities.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function show(Opportunity $opportunity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function edit(Opportunity $opportunity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opportunity $opportunity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opportunity $opportunity)
    {
        //
    }
}
