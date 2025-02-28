<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{

    public function show($id)
    {
        $tour = Tour::with('images')->findOrFail($id);
        return response()->json([
            'title' => $tour->name,
            'description' => $tour->short_description,
            'image' => $tour->cover_image ? Storage::disk('public')->url($tour->cover_image) : null,
            'additional_images' => $tour->images->map(function ($image) {
                return Storage::disk('public')->url($image->path);
            }),
        ]);
    }

    //tour filter by company
    public function filterByCompany($companyId)
    {
        $tours = Tour::where('company_id', $companyId)->get();
        return response()->json($tours);
    }
}
