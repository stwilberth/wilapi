<?php

namespace App\Http\Controllers;
use App\Models\Company;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //index
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    //show
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return response()->json($company);
    }
}
