<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return Brand::where('status', 'active')->get();
    }

    public function show($slug)
    {
        return Brand::where('slug', $slug)->firstOrFail();
    }
}