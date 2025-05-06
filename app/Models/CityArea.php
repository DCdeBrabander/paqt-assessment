<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 *
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CityArea newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CityArea newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CityArea query()
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
        return $this->belongsTo(City::class);
    }

//    public function taxiCompany(): HasOneThrough
//    {
//        return $this->hasOneThrough(TaxiCompany::class, );
//    }
}
