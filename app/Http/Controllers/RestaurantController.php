<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RestaurantController extends Controller
{
    /**
     * Get restaurants by company ID
     *
     * @param int $companyId
     * @return \Illuminate\Http\JsonResponse
     */
    public function filterByCompany($companyId)
    {
        try {
            $restaurants = Restaurant::with(['place', 'place.province'])
                ->whereHas('company', function($query) use ($companyId) {
                    $query->where('id', $companyId);
                })
                ->active()
                ->get()
                ->map(function($restaurant) {
                    return $this->formatRestaurantResponse($restaurant);
                });

            return response()->json([
                'success' => true,
                'data' => $restaurants
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching restaurants by company: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los restaurantes'
            ], 500);
        }
    }

    /**
     * Get restaurants by place ID
     *
     * @param int $placeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function filterByPlace($placeId)
    {
        try {
            $restaurants = Restaurant::with(['place', 'place.province'])
                ->where('place_id', $placeId)
                ->active()
                ->get()
                ->map(function($restaurant) {
                    return $this->formatRestaurantResponse($restaurant);
                });

            return response()->json([
                'success' => true,
                'data' => $restaurants
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching restaurants by place: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los restaurantes por ubicación'
            ], 500);
        }
    }

    /**
     * Get restaurant by company ID and slug
     *
     * @param int $companyId
     * @param string $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($companyId, $slug)
    {
        try {
            $restaurant = Restaurant::with(['place', 'place.province'])
                ->whereHas('company', function($query) use ($companyId) {
                    $query->where('id', $companyId);
                })
                ->where('slug', $slug)
                ->active()
                ->firstOrFail();

            return response()->json([
                'success' => true,
                'data' => $this->formatRestaurantResponse($restaurant, true)
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching restaurant: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Restaurante no encontrado'
            ], 404);
        }
    }

    /**
     * Format restaurant response
     *
     * @param \App\Models\Restaurant $restaurant
     * @param bool $detailed
     * @return array
     */
    private function formatRestaurantResponse($restaurant, $detailed = false)
    {
        $data = [
            'id' => $restaurant->id,
            'name' => $restaurant->name,
            'slug' => $restaurant->slug,
            'short_description' => $restaurant->short_description,
            'phone' => $restaurant->phone,
            'email' => $restaurant->email,
            'website' => $restaurant->website,
            'image_url' => $restaurant->image_url,
            'place' => $restaurant->place ? [
                'id' => $restaurant->place->id,
                'name' => $restaurant->place->name,
                'province' => $restaurant->place->province ? [
                    'id' => $restaurant->place->province->id,
                    'name' => $restaurant->place->province->name
                ] : null
            ] : null,
            'created_at' => $restaurant->created_at,
            'updated_at' => $restaurant->updated_at
        ];

        if ($detailed) {
            $data['description'] = $restaurant->description;
        }

        return $data;
    }
}
