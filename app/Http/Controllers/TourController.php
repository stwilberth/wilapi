<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\TourDate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    public function show($companyId, $slug)
    {
        $tour = Tour::with(['images', 'youtubeLinks', 'tourDates'])
            ->where('company_id', $companyId)
            ->where('slug', $slug)
            ->firstOrFail();
        
        return response()->json($tour);
    }

    public function filterByCompany($companyId)
    {
        $tours = Tour::with(['images', 'youtubeLinks', 'tourDates'])
            ->where('company_id', $companyId)
            ->where('status', 'published')
            ->get();
            
        return response()->json($tours);
    }
}
