<?php

namespace App\Jobs;

use App\Models\COMPANIES_LEAD;
use App\Jobs\LeadProcess;
use Illuminate\Bus\Batch;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Bus;

class GetCompanyProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    public $request;
    public $carriers;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request, $carriers)
    {
        $this->request = $request;
        $this->carriers = $carriers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $request = $this->request;

        if (isset($request['UF'])){
            $uf = $request['UF'];
        }else{
            $uf = false;
        }

        $batch_name = now();
        $batch = Bus::batch([])->name($batch_name)->dispatch();

        $external_companies = COMPANIES_LEAD::when($uf,function ($q) use ($uf) {
                return $q->whereIn('UF',$uf);
            })->limit($request['companies_to_process'])
            ->where('CEP','<>','')
            ->get();
        foreach ($external_companies as $company){
            $batch->add(new LeadProcess($company, $this->carriers));
        }
    }

    public function getCompanies($request)
    {
        if (isset($request['UF'])){
            $uf = $request['UF'];
        }else{
            $uf = false;
        }
        $query = COMPANIES_LEAD::query();

        $query->limit($request['companies_to_process']);
        $query->when($uf,function ($q) use ($uf) {
            return $q->whereIn('UF',$uf);
        });
        return $query;
    }
}
