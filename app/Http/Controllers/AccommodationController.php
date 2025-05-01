<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accommodation;
use Illuminate\Support\Facades\Storage;

class AccommodationController extends Controller
{
    public function show($companyId, $slug)
    {
        $accommodation = Accommodation::with(['images', 'place.province.country', 'youtubeLinks'])
            ->where('company_id', $companyId)
            ->where('slug', $slug)
            ->firstOrFail();
            
        return response()->json($accommodation);
    }

    public function filterByCompany($companyId)
    {
        $accommodations = Accommodation::with(['images', 'place.province.country', 'youtubeLinks'])
            ->where('company_id', $companyId)
            ->get();
        return response()->json($accommodations);
    }

    public function filterByPlace($placeId)
    {
        $accommodations = Accommodation::with(['images', 'place.province.country', 'youtubeLinks'])
            ->where('place_id', $placeId)
            ->get();
        return response()->json($accommodations);
    }
}