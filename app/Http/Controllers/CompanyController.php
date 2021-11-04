<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('opportunities')->withCount('opportunities')->paginate(10);
        return view('companies.index')->with(compact('companies'));
    }

    public function show($company_id)
    {
        $company = Company::with('opportunities')->withCount('opportunities')->findOrFail($company_id);
        return view('companies.show')->with(compact('company'));
    }
}
