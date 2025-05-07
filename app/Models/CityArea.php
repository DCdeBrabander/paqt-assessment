<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 *
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CityArea newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CityArea newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CityArea query()
 * @property int $id
 * @property int $city_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City $city
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resident> $residents
 * @property-read int|null $residents_count
 * @method static \Database\Factories\CityAreaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CityArea whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CityArea whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CityArea whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CityArea whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CityArea whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CityArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function residents(): HasMany
    {
        return $this->hasMany(Resident::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function taxiCompany(): BelongsTo
    {
        return $this->belongsTo(TaxiCompany::class);
    }
}
