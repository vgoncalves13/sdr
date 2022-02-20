<?php

namespace App\Http\Controllers;

use App\Exports\LeadsExport;
use App\Jobs\GetCompany;
use App\Jobs\GetCompanyProcess;
use App\Jobs\LeadProcess;
use App\Jobs\ProcessLead;
use App\Models\Address;
use App\Models\Carrier;
use App\Models\COMPANIES_LEAD;
use App\Models\Company;
use App\Models\CoverageSource;
use App\Models\Lead;
use App\Models\Telephone;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class LeadController extends Controller
{
    protected $lead;
    protected $coverage_source;

    public function __construct(Lead $lead, CoverageSource $coverage_source)
    {
        $this->lead = $lead;
        $this->coverage_source = $coverage_source;
    }

    public function index()
    {
        if (session()->has('companies_to_proccess')){
            $companies_to_proccess = session()->get('companies_to_proccess');
        }else{
            $companies_to_proccess = COMPANIES_LEAD::count();
            session()->put('companies_to_proccess',$companies_to_proccess);
        }

        $generated_leads = Lead::count();
        $leads = Lead::get();

        return view('leads.index')->with(compact(
            'companies_to_proccess',
            'generated_leads',
            'leads'
        ));
    }

    public function create()
    {
        $carriers = DB::table('carriers')->pluck('name','id');
        $batches = DB::table('job_batches')->paginate(10);
        return view('leads.create')->with(compact('carriers','batches'));
    }

    public function debug()
    {
        $external_companies = COMPANIES_LEAD::where('UF','RJ')->limit(10)->get();
        $carriers = Carrier::all();

        foreach ($external_companies as $company){
            foreach ($carriers as $carrier){
                foreach ($carrier->coverage_sources as $source){
                    if ($source->checkPostalCodeCoverage($company->CEP)){
                        $lead_status = $source->setLeadClassification($company->CEP, $company->NUMERO);

                        if ($lead_status != 'NO_COVER'){
                            $intern_company = new Company();
                            $intern_company->cnpj = $company->CNPJ;
                            $intern_company->name = $company->NOME;
                            $intern_company->save();

                            $address = new Address();
                            $address->address = $company->ENDERECO;
                            $address->address2 = $company->COMPLEMENTO;
                            $address->number = $company->NUMERO;
                            $address->address = $company->ENDERECO;
                            $address->district = $company->BAIRRO;
                            $address->city = $company->CIDADE;
                            $address->state = $company->UF;
                            $address->postal_code = $company->CEP;
                            $address->company_id = $intern_company->id;
                            $address->save();

                            //TODO check if is mobile or landline

                            $telephones = array();
                            $cellphones = array();

                            if (!empty($company->FIXO1)){
                                $telephones[]['number'] = $company->FIXO1;
                            }
                            if (!empty($company->FIXO2)){
                                $telephones[]['number'] = $company->FIXO2;
                            }
                            if (!empty($company->FIXO3)){
                                $telephones[]['number'] = $company->FIXO3;
                            }
                            if (!empty($company->CEL1)){
                                $cellphones[]['number'] = $company->CEL1;
                            }
                            if (!empty($company->CEL2)){
                                $cellphones[]['number'] = $company->CEL2;
                            }
                            if (!empty($company->CEL3)){
                                $cellphones[]['number'] = $company->CEL3;
                            }

                            foreach ($telephones as $key => $value) {
                                $telephone[$key] = $value;
                                $telephone[$key]['type'] = 'fixo';
                            }

                            foreach ($cellphones as $key => $value) {
                                $cellphones[$key] = $value;
                                $cellphones[$key]['type'] = 'celular';
                            }

                            $intern_company->telephones()->createMany($telephones);
                            $intern_company->telephones()->createMany($cellphones);


                            Lead::create([
                                'status' => $lead_status,
                                'carrier_id' => $carrier->id,
                                'company_id' => $intern_company->id
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function process(Request $request)
    {
        $this->validate($request,[
            'companies_to_process' => 'required|max:50000',
        ]);
        if (isset($request->carrier)){
            $carriers = Carrier::whereIn('id',$request->carrier)->get();
        }else{
            $carriers = Carrier::all();
        }
        GetCompanyProcess::dispatch($request->all(), $carriers);

        Session::flash('message',__('messages.custom',[
            'objeto' => 'Processamento criado!',
            'nome' => ''
        ]));
        Session::flash('alert-class', 'alert-success');

        return redirect()->back();

    }

    public function show(Lead $lead)
    {

    }

    public function export()
    {
        return view('exports.index');
    }

    public function export_ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = COMPANIES_LEAD::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('exports.index');
    }
}
