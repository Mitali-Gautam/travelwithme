<?php

namespace App\Repositories;

use App\Interfaces\HotelRepositoryInterface;
use App\Models\Hotel;

class HotelRepository implements HotelRepositoryInterface {

    public function __construct(Hotel $hotel) {
        $this->hotel = $hotel;
    }

    public function getHotelById($hotelId){
        $hotel = $this->hotel->findorfail($hotelId);
        if(!$hotel){
            throw new HotelException();
        }
        return $hotel;
    }

    public function getAllHotels() {
        return $this->hotel->all();

    }

    public function storeHotel(array $hotelDetails) {
        return $this->hotel->create($hotelDetails);
    }

    public function updateHotel($hotelId, $hotelDetails) {

    }

    public function deleteHotel($hotelId) {
        $hotel = $this->getHotelById($hotelId);
        return $hotel->delete();
    }

    public function getCountryCityDetails() {
        $hotels = $this->hotel->with('country','city')->get();
        return $hotels;
    }
}
