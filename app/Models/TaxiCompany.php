<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaxiRide> $taxiRides
 * @property-read int|null $taxi_rides_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiCompany newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiCompany newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiCompany query()
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TaxiCompanyFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiCompany whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiCompany whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiCompany whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiCompany whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaxiCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function taxiRides(): HasMany
    {
        return $this->hasMany(TaxiRide::class);
    }

    public function cityArea(): BelongsTo
    {
        return $this->belongsTo(CityArea::class);
    }
}
