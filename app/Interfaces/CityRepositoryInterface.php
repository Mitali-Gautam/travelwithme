<?php

namespace App\Interfaces;

interface CityRepositoryInterface
{
    public function getAllcities();
    public function deleteCity($cityId);
    public function storeCity(array $cityDetails);
    public function updateCity($cityId, array $cityDetails);
}
