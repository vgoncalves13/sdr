<?php

namespace App\Jobs;

use App\Models\Address;
use App\Models\Company;
use App\Models\Lead;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class LeadProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, Batchable;

    public $carriers;
    public $company;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($company, $carriers)
    {
        $this->company = $company;
        $this->carriers = $carriers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle()
    {

        $company = $this->company;
        $carriers = $this->carriers;
        foreach ($carriers as $carrier){
            foreach ($carrier->coverage_sources as $source){
                if ($source->checkCoverage($company->CEP, $company->NUMERO)){
                    //TODO get classification

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
                        'status' => 'A',
                        'carrier_id' => $carrier->id,
                        'company_id' => $intern_company->id
                    ]);
                }
            }
        }
    }
}
