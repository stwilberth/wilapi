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
        $tour = Tour::with(['images', 'youtubeLinks'])
            ->where('company_id', $companyId)
            ->where('slug', $slug)
            ->firstOrFail();
            
        // Obtener la próxima fecha de salida
        $upcomingDate = TourDate::where('tour_id', $tour->id)
            ->where('date', '>=', now())
            ->where('status', 'available')
            ->orderBy('date')
            ->first();
            
        $tourArray = $tour->toArray();
        $tourArray['next_date'] = $upcomingDate ? [
            'id' => $upcomingDate->id,
            'date' => $upcomingDate->date,
            'available_slots' => $upcomingDate->available_slots,
            'price' => $upcomingDate->price,
            'price_foreigners' => $upcomingDate->price_foreigners,
            'currency' => $upcomingDate->currency,
            'formatted_date' => $upcomingDate->date->format('d/m/Y H:i'),
            'formatted_price' => $upcomingDate->currency === 'USD' 
                ? '$' . number_format($upcomingDate->price, 2)
                : '₡' . number_format($upcomingDate->price, 2),
            'formatted_price_foreigners' => $upcomingDate->currency === 'USD'
                ? '$' . number_format($upcomingDate->price_foreigners, 2)
                : '₡' . number_format($upcomingDate->price_foreigners, 2)
        ] : null;
        
        return response()->json($tourArray);
    }

    public function filterByCompany($companyId)
    {
        $tours = Tour::with(['images', 'youtubeLinks'])
            ->where('company_id', $companyId)
            ->where('status', 'published')
            ->get()
            ->map(function($tour) {
                // Obtener la próxima fecha de salida para cada tour
                $upcomingDate = TourDate::where('tour_id', $tour->id)
                    ->where('date', '>=', now())
                    ->where('status', 'available')
                    ->orderBy('date')
                    ->first();
                    
                $tourArray = $tour->toArray();
                $tourArray['next_date'] = $upcomingDate ? [
                    'id' => $upcomingDate->id,
                    'date' => $upcomingDate->date,
                    'available_slots' => $upcomingDate->available_slots,
                    'price' => $upcomingDate->price,
                    'price_foreigners' => $upcomingDate->price_foreigners,
                    'currency' => $upcomingDate->currency,
                    'formatted_date' => $upcomingDate->date->format('d/m/Y H:i'),
                    'formatted_price' => $upcomingDate->currency === 'USD' 
                        ? '$' . number_format($upcomingDate->price, 2)
                        : '₡' . number_format($upcomingDate->price, 2),
                    'formatted_price_foreigners' => $upcomingDate->currency === 'USD'
                        ? '$' . number_format($upcomingDate->price_foreigners, 2)
                        : '₡' . number_format($upcomingDate->price_foreigners, 2)
                ] : null;
                
                return $tourArray;
            });
            
        return response()->json($tours);
    }
}
