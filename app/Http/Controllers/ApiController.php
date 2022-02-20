<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Service;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllLeads()
    {
        $leads = Lead::get()->toJson(JSON_PRETTY_PRINT);
        return response($leads, 200);
    }

    public function getServicesList()
    {
        $list = Service::all();
        return response()->json(['data' => $list]);
    }
}
