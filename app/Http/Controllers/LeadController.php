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

        //TODO Create page view status queue
        Session::flash('message',__('messages.custom',[
            'objeto' => 'Processamento criado!',
            'nome' => ''
        ]));
        Session::flash('alert-class', 'alert-success');

        return redirect()->back();



//        $big_data = COMPANIES_LEAD::when($uf, function($query) use ($uf) {
//            return $query->where('UF', '=', $uf);
//        })->limit(100)->chunk(10, function ($companies) {
//            foreach ($companies as $company){
//
//            }
//        });
        //return (new LeadsExport)->download('lead.xlsx');

//        (new LeadsExport($uf))->queue('leads/'.date('d/m/Y/').Carbon::now()->format('d-m-Y').'-leads.xlsx');
//
//        Session::flash('message',__('messages.success',[
//            'objeto' => 'Seu arquivo será processado e ficará disponível para download em breve!',
//            'nome' => ''
//        ]));
//        Session::flash('alert-class', 'alert-success');
//
//        return redirect()->back();
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
