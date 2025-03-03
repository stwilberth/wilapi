<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function filterByCompany($company_id)
    {
        return Product::where('company_id', $company_id)
            ->where('status', 'active')
            ->with(['category', 'brand', 'images'])
            ->get();
    }

    public function show($company_id, $slug)
    {
        return Product::where('company_id', $company_id)
            ->where('slug', $slug)
            ->with(['category', 'brand', 'images'])
            ->firstOrFail();
    }
}