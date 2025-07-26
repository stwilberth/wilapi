<?php

namespace App\Http\Controllers;

use App\Models\TourDate;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TourDateController extends Controller
{
    /**
     * Get all tour dates with optional filtering
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $query = TourDate::where('status', 'available');
        
        if ($request->has('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        if ($request->has('tour_id')) {
            $query->where('tour_id', $request->tour_id);
        }

        $tourDates = $query->get();

        return response()->json($tourDates);
    }

    /**
     * Get tour dates by company ID
     *
     * @param int $companyId
     * @return JsonResponse
     */
    public function getByCompany(int $companyId): JsonResponse
    {
        $tourDates = TourDate::where('company_id', $companyId)
            ->where('status', 'available')
            ->get();

        return response()->json($tourDates);
    }

    /**
     * Get tour dates by tour ID
     *
     * @param int $tourId
     * @return JsonResponse
     */
    public function getByTour(int $tourId): JsonResponse
    {
        $tourDates = TourDate::where('tour_id', $tourId)
            ->where('status', 'available')
            ->get();

        return response()->json($tourDates);
    }
}
