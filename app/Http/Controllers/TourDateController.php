<?php

namespace App\Http\Controllers;

use App\Models\TourDate;
use Illuminate\Http\Request;

class TourDateController extends Controller
{
    public function index(Request $request)
    {
        $query = TourDate::with('tour', 'company');

        if ($request->has('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        if ($request->has('tour_id')) {
            $query->where('tour_id', $request->tour_id);
        }

        $tourDates = $query->get();

        return response()->json($tourDates);
    }
}
