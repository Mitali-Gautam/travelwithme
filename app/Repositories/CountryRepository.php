<?php

namespace App\Repositories;

use App\Interfaces\CountryRepositoryInterface;
use App\Models\Country;

class CountryRepository implements CountryRepositoryInterface {

    public function __construct(Country $country){
        $this->country = $country;
    }

    public function getCountryById($countryId){
        $country =  $this->country->findorfail($countryId);
        if(!$country){
            throw new CountryException();
        }
        return $country;
    }

    public function getAllCountries(){
        return $this->country->get();
    }

    public function storeCountry(array $countryDetails){
        return $this->country->create($countryDetails);
    }

    public function updateCountry($countryId,$countryDetails){
        $country = $this->getCountryById($countryId);
        $country->name = $countryDetails['name'];
        $country->description = $countryDetails['description'];
        $country->country_code = $countryDetails['country_code'];
        $country->save();
    }

    public function deleteCountry($countryId) {
        $country = $this->getCountryById($countryId);
        return $country->delete();

    }
}
