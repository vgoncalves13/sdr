<?php

namespace App\Models;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class COMPANIES_LEAD extends Model implements ShouldQueue
{
    use HasFactory;

    protected $connection = 'mysql_external';
    protected $table = 'CLIENTE_PJ_BIGDATA';

    public function getCnpj($cnpj)
    {
        $result = COMPANIES_LEAD::where('cnpj',$cnpj)->first();
        return $result;
    }
}
