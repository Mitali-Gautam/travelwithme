<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\HotelRepositoryInterface;
use App\Interfaces\CountryRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public $hotelRepository;

    public function __construct(HotelRepositoryInterface $hotelRepository, CountryRepositoryInterface $countryRepository) {
        $this->hotelRepository = $hotelRepository;
        $this->countryRepository = $countryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       // $hotels = $this->hotelRepository->getAllHotels();
        $hotelDetails = $this->hotelRepository->getCountryCityDetails();
        return view('hotel.index',["hotels"=>$hotelDetails]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $countries = $this->countryRepository->getAllCountries();
        return view('hotel.create',['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try{
            // Check if file exists in the request
             if ($request->hasFile('hotel_image')) {
                /*$request->validate([
                    'hotel_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
                ]);*/
                    // Get the file size
                    $fileSize = $request->file('hotel_image')->getSize();

                    // Check if the file size exceeds the maximum allowed size (in bytes)
                    /*if ($fileSize > 5120) {
                        // Redirect back with error message
                        return redirect()->back()->withInput()->withErrors(['hotel_image' => 'The file size exceeds the maximum allowed size (2MB).']);
                    }*/

                    // Proceed with file upload
                    $imageName = $request->file('hotel_image')->getClientOriginalName();
                    $image = $request->file('hotel_image');
                    $path = $image->store('uploads', 'public');  // Store the file in storage/app/public/uploads

                    // Save the file or perform any other necessary operations
            }else{
                $imageName = '';
            }
            // Store the actual image in the public folder (inside storage/app/public)

            $data = array(
                'name' => $request->hotel_name,
                'country_id'=> $request->country_id,
                'city_id'=> $request->city_id,
                'description'=> $request->hotel_description,
                'address'=> $request->hotel_address,
                'postal_code'=> $request->postal_code,
                'contact_no'=> $request->contact_no,
                'email'=> $request->email,
                'rating'=> $request->rating,
                'check_in'=> $request->check_in,
                'check_out'=> $request->check_out,
                'hotel_temp_image_name'=> $imageName,
            );


            $this->hotelRepository->storeHotel($data);
            session()->flash("success","Hotel Created Successfully ");
            return redirect()->route('hotel.create');

        }catch(HotelException $e){
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hotel =  $this->hotelRepository->getHotelById($id);
        return view('hotel.view',['hotel'=>$hotel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $hotel =  $this->hotelRepository->getHotelById($id);
            return view('hotel.edit',['hotel'=>$hotel]);
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
                'country_id'=> $request->country_id,
                'city_id'=> $request->city_id,
                'description'=> $request->hotel_description,
                'address'=> $request->hotel_address,
                'postal_code'=> $request->postal_code,
                'contact_no'=> $request->contact_no,
                'email'=> $request->email,
                'rating'=> $request->rating,
                'check_in'=> $request->check_in,
                'check_out'=> $request->check_out
            );
            $this->hotelRepository->updateHotel($id,$data);
            session()->flash("success","Country Updated Successfully ");
            return redirect()->route('countries');

        } catch (HotelException $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try{
            $hotel = $this->hotelRepository->deleteHotel($id);
            session()->flash("success","Hotel Deleted Successfully ");
            return redirect()->route('hotels');
        }catch (HotelException $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getHotels() {

    }
}
