<?php
namespace App\Repositories;

use App\Interfaces\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface {

    public function __construct(City $city) {
        $this->city = $city;
    }

    public function getAllcities() {
        return $this->city->get();
    }

    public function storeCity(array $cityDetails) {
        return $this->city->create($cityDetails);
    }
}
