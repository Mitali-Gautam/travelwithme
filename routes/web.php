<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HotelController;

Route::get('/', function () {
    return view('welcome');
});

// country crud operations routes
Route::get("/countries",[CountryController::class,'index'])->name("countries");
Route::get("/countries/create",[CountryController::class,'create'])->name("country.create");
Route::post("/countries/store",[CountryController::class,'store'])->name("country.store");
Route::get("/countries/edit/{id}",[CountryController::class,'edit'])->name("country.edit");
Route::post("/countries/update/{id}",[CountryController::class,'update'])->name("country.update");
Route::get("/countries/delete/{id}",[CountryController::class,'delete'])->name("country.delete");

// city crud operations routes
Route::get("/cities",[CityController::class,'index'])->name("cities");
Route::get("/cities/create",[CityController::class,'create'])->name("city.create");
Route::post("/cities/store",[CityController::class,'store'])->name("city.store");
Route::get("/cities/edit/{id}",[CityController::class,'edit'])->name("city.edit");
Route::post("/cities/update/{id}",[CityController::class,'update'])->name("city.update");
Route::get("/cities/delete/{id}",[CityController::class,'delete'])->name("city.delete");
Route::get('/cities/{country}',[CityController::class,'getCities'])->name('getCities');

// hotel crud operations routes
Route::get("/hotels",[HotelController::class,'index'])->name("hotels");
Route::get("/hotels/create",[HotelController::class,'create'])->name("hotel.create");
Route::post("/hotels/store",[HotelController::class,'store'])->name("hotel.store");
Route::get("/hotels/edit/{id}",[HotelController::class,'edit'])->name("hotel.edit");
Route::post("/hotels/update/{id}",[HotelController::class,'update'])->name("hotel.update");
Route::get("/hotels/delete/{id}",[HotelController::class,'delete'])->name("hotel.delete");

