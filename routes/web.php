<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;

Route::get('/', function () {
    return view('welcome');
});

// country crud operations routes
Route::get("/countries",[CountryController::class,'index'])->name("countries");


// city crud operations routes
Route::get("/cities",[CityController::class,'index'])->name("cities");
Route::get("/cities/create",[CityController::class,'create'])->name("city.create");
Route::post("/cities/store",[CityController::class,'store'])->name("city.store");
Route::get("/cities/edit/{id}",[CityController::class,'edit'])->name("city.edit");
Route::post("/cities/update/{id}",[CityController::class,'update'])->name("city.update");
