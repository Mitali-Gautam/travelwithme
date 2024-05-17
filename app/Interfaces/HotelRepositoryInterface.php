<?php

namespace App\Interfaces;

interface HotelRepositoryInterface
{
    public function getAllHotels();
    public function storeHotel(array $hotelDetails);
    public function updateHotel($hotelId,array $hotelDetails);
    public function deleteHotel($hotelId);
}
