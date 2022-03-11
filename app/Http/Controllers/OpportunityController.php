<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpportunityComplementRequest;
use App\Http\Requests\OpportunityCreateRequest;
use App\Models\COMPANIES_LEAD;
use App\Models\Company;
use App\Models\Opportunity;
use App\Models\OpportunityFollowUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OpportunityController extends Controller
{

    protected $companies_lead;
    protected $opportunity;

    public function __construct()
    {
        $this->companies_lead = new COMPANIES_LEAD();
        $this->opportunity = new Opportunity();
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (Auth::user()->hasRole('administrator')){
            $opportunities = Opportunity::with(['company.address'])->get();
        }else {
            $opportunities = Opportunity::with(['company.address'])->where('user_id',Auth::id())->get();
        }
        return view('opportunies.index')->with(compact('opportunities'));
    }

    /**
     * Show the form for creating a new resource.
     *
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
        if (isset($request->cnpj)){
            $company = Company::with(['opportunities','address','telephones'])->where('cnpj',$request->cnpj);
            if (!$company->exists()){
                $external_company = $this->companies_lead->getCnpj($request->cnpj);
                if (!$external_company->exists()){
                    \session()->put('cnpj',$request->cnpj);
                    Session::flash('message','Nenhuma empresa encontrada, favor inserir as informações!');
                    Session::flash('alert-class', 'alert-warning');
                    return view('opportunies.create_data');
                }else{
                    return view('opportunies.select_companies')
                        ->with('companies', $external_company->limit('50')->get());
                }
            }
            return view('opportunies.create_opportunity')->with('company', $company->first());
        }

        $company = Company::with(['opportunities','address','telephones'])
            ->where('name','like','%' . $request->name . '%');
        if (!$company->exists()){
            $external_company = $this->companies_lead->getByName($request->name);
            if (!$external_company->exists()){
                \session()->put('cnpj',$request->cnpj);
                Session::flash('message','Nenhuma empresa encontrada, favor inserir as informações!');
                Session::flash('alert-class', 'alert-warning');
                return view('opportunies.create_data');
            }else{
                return view('opportunies.select_companies')
                    ->with('companies', $external_company->limit('50')->get());
            }
        }
        return view('opportunies.select_companies')->with('companies', $company->get());
    }

    public function dispatch_opportunity($company_id, $type)
    {
        if ($type == 'EXTERNAL'){
            $company = COMPANIES_LEAD::where('Id',$company_id)->first();
            return view('opportunies.create_opportunity_external')->with('company', $company);
        }else{
            $company = Company::find($company_id);
            return view('opportunies.create_opportunity')->with('company', $company);
        }
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
        $company->telephones()->createMany($telephone_data);
        $company->telephones()->createMany($cellphone_data);

        $opportunity = $company->opportunities()->create($request->all());
        $opportunity->services()->attach($request->services);

        $opp_followup = new OpportunityFollowUp();
        $opp_followup->observations = $request->observations;
        $opp_followup->opportunity_id = $opportunity->id;
        $opp_followup->save();

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
    public function store(OpportunityComplementRequest $request, Company $company = null)
    {
        $opportunity = $company->opportunities()->create($request->all());
        $opportunity->services()->attach($request->services);

        $opp_followup = new OpportunityFollowUp();
        $opp_followup->observations = $request->observations;
        $opp_followup->opportunity_id = $opportunity->id;
        $opp_followup->save();

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
     */
    public function show(Opportunity $opportunity)
    {
        $opp_followup = OpportunityFollowUp::where('opportunity_id', $opportunity->id)
            ->get();
        if (
            Auth::user()->hasRole(['administrator', 'manager']) ||
            Auth::user()->owns($opportunity)) {
            return view('opportunies.show')->with(compact('opportunity','opp_followup'));
        }else{
            return abort('403');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opportunity  $opportunity
     */
    public function edit(Opportunity $opportunity)
    {
        return view('opportunies.edit')->with(compact('opportunity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opportunity  $opportunity
     */
    public function update(Request $request, Opportunity $opportunity)
    {

        $opportunity->temperature = $request->temperature;
        $opportunity->save();

        $opportunity->opportunities_followup()->create($request->all());

        Session::flash('message',__('messages.followup'));
        Session::flash('alert-class', 'alert-success');
        return redirect(route('opportunities.show',$opportunity));
    }

    public function add_service(Opportunity $opportunity)
    {
        return view('opportunies.add_service')->with(compact('opportunity'));
    }

    public function store_add_service(Request $request, Opportunity $opportunity)
    {
        $opportunity->services()->attach($request->services);

        Session::flash('message',__('messages.service_add'));
        Session::flash('alert-class', 'alert-success');
        return redirect(route('opportunities.show',$opportunity));
    }


}
