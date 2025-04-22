<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Support\Facades\Storage;

class AccommodationController extends Controller
{
    public function show($companyId, $slug)
    {
        $accommodation = Accommodation::with('images')
            ->where('company_id', $companyId)
            ->where('slug', $slug)
            ->firstOrFail();
            
        return response()->json($accommodation);
    }

    public function filterByCompany($companyId)
    {
        $accommodations = Accommodation::where('company_id', $companyId)->get();
        return response()->json($accommodations);
    }
}