<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $companies_total = Company::all()->count();
        $opportunities_total = Opportunity::all()->count();

        $sql_opportunities_temperature = DB::table('opportunities')
            ->select(DB::raw('temperature,count(*) as value'))
            ->groupBy('temperature')
            ->orderBy('temperature','asc')
            ->get();

        $total_value_temperature = DB::table('opportunities')
            ->join('opportunity_service', 'opportunities.id', '=', 'opportunity_service.opportunity_id')
            ->select(DB::raw(
                'opportunities.temperature as temperature, SUM(opportunity_service.quantity * opportunity_service.value) as total'))
            ->groupBy('temperature')
            ->orderBy('temperature','asc')
            ->get();

        foreach ($total_value_temperature as $key => $value){
            $total_value[$value->temperature] = $value->total;
        }

        $arr = $sql_opportunities_temperature;


        foreach ($arr as $key => $op){
            $total[$op->temperature] = $op->value;
        }

        $count_opportunities_temperatures = $total;

        return view('dashboard.index')
            ->with(compact(
                'companies_total',
                'opportunities_total',
                'count_opportunities_temperatures',
                'sql_opportunities_temperature',
                'total_value'
            ));
    }
}
