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
            ->select(DB::raw('temperature,count(*) as total_by_temperature'))
            ->groupBy('temperature')
            ->orderBy('temperature','desc')
            ->get();
        $arr = array();
        foreach ($sql_opportunities_temperature as $key => $op){

            $arr[$op->temperature] = $op->total_by_temperature;
        }
        $count_opportunities_temperatures = $arr;


        return view('dashboard.index')
            ->with(compact(
                'companies_total',
                'opportunities_total',
                'count_opportunities_temperatures'
            ));
    }
}
