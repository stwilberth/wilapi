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
        
        // Add booking information
        $tour->can_book = $tour->canBook();
        $tour->available_booking_dates = $tour->getAvailableBookingDates();
        
        return response()->json($tour);
    }

    public function filterByCompany($companyId)
    {
        $tours = Tour::with(['images', 'youtubeLinks', 'tourDates'])
            ->where('company_id', $companyId)
            ->where('status', 'published')
            ->bookable()
            ->get();
            
        // Add booking information to each tour
        $tours->each(function ($tour) {
            $tour->can_book = $tour->canBook();
            $tour->available_booking_dates = $tour->getAvailableBookingDates();
        });
            
        return response()->json($tours);
    }

    /**
     * Validate if a tour can be booked on a specific date
     */
    public function validateBooking(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'date' => 'required|date|after_or_equal:today'
        ]);

        $tour = Tour::findOrFail($request->tour_id);
        
        // Check if tour can be booked
        if (!$tour->canBook()) {
            return response()->json([
                'error' => 'Este tour no está disponible para reservas',
                'can_book' => false
            ], 400);
        }

        // If tour only allows booking by schedules, validate date exists
        if ($tour->only_book_by_schedules) {
            $tourDate = $tour->tourDates()
                ->where('date', $request->date)
                ->where('status', 'active')
                ->where('available_slots', '>', 0)
                ->first();
                
            if (!$tourDate) {
                return response()->json([
                    'error' => 'La fecha seleccionada no está disponible para este tour',
                    'can_book' => false
                ], 400);
            }
            
            return response()->json([
                'can_book' => true,
                'tour_date_id' => $tourDate->id,
                'available_slots' => $tourDate->available_slots,
                'price' => $tourDate->formatted_price,
                'foreigner_price' => $tourDate->formatted_foreigner_price
            ]);
        }

        return response()->json([
            'can_book' => true,
            'message' => 'Tour disponible para reserva'
        ]);
    }
}
