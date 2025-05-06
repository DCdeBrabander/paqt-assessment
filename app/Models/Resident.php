<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 *
 *
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\CityArea|null $cityArea
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaxiRide> $taxiRides
 * @property-read int|null $taxi_rides_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resident newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resident newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resident query()
 * @mixin \Eloquent
 */
class Resident extends Model
{
    use HasFactory;

    public function taxiRides(): HasMany
    {
        return $this->hasMany(TaxiRide::class);
    }

    public function cityArea(): HasOne
    {
        return $this->hasOne(CityArea::class);
    }

    public function city(): HasOne
    {
        return $this->hasOne(City::class);
    }
}
