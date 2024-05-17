<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CountryRepositoryInterface;

class CountryController extends Controller
{
    protected $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository){
        $this->countryRepository = $countryRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = $this->countryRepository->getAllCountries();
        return view('country.index',["countries"=>$countries]);
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $data = array(
                'name' => $request->name,
                'description'=> $request->country_desciption,
                'country_code'=> $request->country_code,
            );

            $this->countryRepository->storeCountry($data);
            session()->flash("success","Country Created Successfully ");
            return redirect()->route('country.create');

        }catch(CountryException $e){
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
        try{
            $country =  $this->countryRepository->getCountryById($id);
            return view('country.edit',['country'=>$country]);
        }catch (\Exception $e) {
            abort(Response::HTTP_NOT_FOUND, 'The invitation token is invalid.');
            // return view('errors.404', ['message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $data = array(
                'name' => $request->name,
                'description'=> $request->country_description,
                'country_code'=> $request->country_code,
            );
            $this->countryRepository->updateCountry($id,$data);
            session()->flash("success","Country Updated Successfully ");
            return redirect()->route('countries');

        } catch (CountryException $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try{
            $country = $this->countryRepository->deleteCountry($id);
            session()->flash("success","Country Deleted Successfully ");
            return redirect()->route('countries');
        }catch (CountryException $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function view($id)
    {
        $country =  $this->countryRepository->getCountryById($id);
        return view('country.view',$country);
    }
}
