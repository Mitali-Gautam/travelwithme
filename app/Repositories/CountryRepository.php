<?php

namespace App\Repositories;

use App\Interfaces\CountryRepositoryInterface;
use App\Models\Country;

class CountryRepository implements CountryRepositoryInterface {

    public function __construct(Country $country){
        $this->country = $country;
    }

    public function getAllCountries(){
        return $this->country->get();
    }
}
