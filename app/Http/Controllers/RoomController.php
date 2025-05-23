<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function filterByCompany($company_id)
    {
        return Room::with('youtubeLinks')
            ->where('company_id', $company_id)
            ->where('status', 'available')
            ->get();
    }

    public function show($company_id, $slug)
    {
        return Room::with(['images', 'youtubeLinks'])
            ->where('company_id', $company_id)
            ->where('slug', $slug)
            ->firstOrFail();
    }
}