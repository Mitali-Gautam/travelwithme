<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\HotelRepositoryInterface;

class HotelControllerAPI extends Controller
{

    public function __construct(HotelRepositoryInterface $hotelRepository) {
        $this->hotelRepository = $hotelRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$hotels= $this->hotelRepository->getAllHotels();
        $hotels = $this->hotelRepository->getCountryCityDetails();
         // Append image URLs to each hotel
         $hotels->transform(function ($hotel) {
            $hotel->hotel_temp_image_name = asset("storage/{$hotel->hotel_temp_image_name}");
            return $hotel;
        });

        return response()->json($hotels);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
