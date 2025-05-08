<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\HasCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $phone
 * @property string $address
 * @property int $city_id
 * @property int $city_area_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ResidentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resident whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resident whereCityAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resident whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resident whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resident whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resident whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resident whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resident wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resident whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Resident extends Model
{
    use HasFactory;

    public function taxiBudget(): HasOne
    {
        return $this->hasOne(ResidentTaxiBudget::class);
    }

    public function taxiRides(): HasMany
    {
        return $this->hasMany(TaxiRide::class);
    }

    public function cityArea(): BelongsTo
    {
        return $this->belongsTo(CityArea::class, 'city_area_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
