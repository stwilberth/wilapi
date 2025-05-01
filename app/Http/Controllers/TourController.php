<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{

    public function show($companyId, $slug)
    {
        $tour = Tour::with(['images', 'youtubeLinks'])->where('company_id', $companyId)->where('slug', $slug)->firstOrFail();
        return response()->json($tour);
    }

    //tour filter by company
    public function filterByCompany($companyId)
    {
        $tours = Tour::with(['images', 'youtubeLinks'])->where('company_id', $companyId)->get();
        return response()->json($tours);
    }
}
