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

    public function getServicesList($id = null)
    {
        if (isset($id)){
            $list = Service::findOrfail($id);
            return response()->json(['data' => $list]);
        }
        $list = Service::all();
        return response()->json(['data' => $list]);
    }

    public function getClassificationsService($id)
    {
        $service = Service::findOrfail($id);
        $classifications = $service->classifications;
        return response()->json(['data' => $classifications]);
    }
}
