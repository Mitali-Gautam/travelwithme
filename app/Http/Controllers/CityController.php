<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CityRepositoryInterface;
use App\Interfaces\CountryRepositoryInterface;
//use App\Models\City;

class CityController extends Controller
{
    protected $cityRepository;
    protected $countryRepository;

    public function __construct(CityRepositoryInterface $cityRepository,CountryRepositoryInterface $countryRepository) {
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = $this->cityRepository->getAllCities();
        return view('city.index',["cities"=>$cities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = $this->countryRepository->getAllCountries();
        return view('city.create',["countries" => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $data = array(
                'name' => $request->name,
                'country_id' => $request->country_id,
                'description'=> $request->city_desciption,
            );

            $this->cityRepository->storeCity($data);
            session()->flash("success","City Created Successfully ");
            return redirect()->route('city.create');

        }catch(AuthorException $e){
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
