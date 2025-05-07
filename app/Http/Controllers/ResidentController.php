<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaxiRideRequest;
use App\Http\Resources\ResidentResource;
use App\Models\City;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function indexByCity(City $city): JsonResource
    {
        return ResidentResource::collection($city->residents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function storeRide(StoreTaxiRideRequest $request, Resident $resident)
    {
        $ride = $resident->taxiRides()->create([
            ...$request->validated(),
            'taxi_company_id' => $resident->cityArea->taxiCompany->id
        ]);

        return response()->json(
            $ride->load('taxiCompany'),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
