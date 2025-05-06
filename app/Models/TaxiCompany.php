<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaxiRide> $taxiRides
 * @property-read int|null $taxi_rides_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiCompany newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiCompany newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiCompany query()
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
}
