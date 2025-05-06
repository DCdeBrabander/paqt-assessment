<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\TaxiController;
use Illuminate\Support\Facades\Route;

# get residents of city (municipality) (EZ)
//GET /city/X/residents

# get information of 'user' (resident) X
//GET /residents/X

# create ride for user
//POST /residents/X/rides

# fetch rides for taxi service
//GET /taxiservices/X/rides

/*
Models:
 - taxi
 - resident
 - city
 - Ride

Relations:
 - City has many Residents
 - City has many Areas
 - Residents has Rides
 - Residents has one Area
 - Taxiservice has many Rides
 - Taxiservice has one Area
 */

# base API route definitions
Route::apiResources([
    'cities' => CityController::class,
    'taxis' => TaxiController::class,
    'residents' => ResidentController::class,
]);

# Nested routes
Route::get('cities/{city}/residents', [ResidentController::class, 'indexByCity']);
