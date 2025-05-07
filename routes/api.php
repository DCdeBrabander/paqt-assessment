<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\TaxiController;
use App\Http\Controllers\TaxiCompanyController;
use Illuminate\Support\Facades\Route;

# get information of 'user' (resident) X
//GET /residents/X

# create ride for user
//POST /residents/X/rides

# fetch rides for taxi service
//GET /taxiservices/X/rides

/*
 Relations:
 - City has many Residents
 - City has many Areas
 - Residents has Rides
 - Residents has one Area
 - Taxiservice has many Rides
 - Taxiservice has one Area
 */
// Fetch residents by city, but respecting REST it should be like this.
Route::get('cities/{city}/residents', [ResidentController::class, 'indexByCity']);

// Resident is the primary resource in this context, so if one want to save 'a ride for a resident'
// this route makes most sense. Also TaxiRides are currently not a primary resource (and always linked to a resident and company)
Route::post('residents/{resident}/rides', [ResidentController::class, 'storeRide']);

// Not TaxiRideController, again TaxiRide should not be a primary resource, at this time.
Route::get('taxi/{taxiCompany}/rides', [TaxiCompanyController::class, 'rideIndex']);

# base API route definitions
Route::apiResources([
    'cities' => CityController::class,
    'taxis' => TaxiController::class,
    'residents' => ResidentController::class,
]);

