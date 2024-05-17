<?php
namespace App\Repositories;

use App\Interfaces\CityRepositoryInterface;
use App\Models\City;
use App\Models\Country;

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

    public function getCityById($id){
        $city = $this->city->findorfail($id);
        if(!$city){

        }
        return $city;
    }

    public function updateCity($id,$cityDetails){
        $city = $this->getCityById($id);
        $city->name = $cityDetails['name'];
        $city->country_id = $cityDetails['country_id'];
        $city->description = $cityDetails['description'];
        $city->save();
    }

    public function deleteCity($id){
        $city = $this->getCityById($id);
        return $city->delete();
    }

    public function getCities($countryId) {
        $cities = $this->city->where('country_id',$countryId)->select('id', 'name')->get();
        return response()->json($cities);
    }
}
