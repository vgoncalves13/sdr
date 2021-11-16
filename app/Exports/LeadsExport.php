<?php

namespace App\Exports;

use App\Models\COMPANIES_LEAD;
use App\Models\Lead;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LeadsExport implements FromQuery, WithMapping, WithHeadings
{
    protected $parameters;

    use Exportable;

    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    public function headings(): array
    {
//        return [
//            'Status',
//            'ID',
//            'Operadora'
//        ];
        return [
            'CNPJ',
            'NOME',
            'ENDERECO',
            'NUMERO'
        ];
    }

    public function map($lead): array
    {
        return [
            $lead->CNPJ,
            $lead->NOME,
            $lead->ENDERECO,
            $lead->NUMERO,
        ];
//        return [
//            $lead->status,
//            $lead->id,
//            $lead->carrier->name,
//        ];
    }

    public function query()
    {
        //Lead::query()->limit(100);
        //return COMPANIES_LEAD::query()->where('UF',$this->parameters)->limit(100);
        return COMPANIES_LEAD::query()->where('NOME','like','%TELEMAR%');
    }
}
