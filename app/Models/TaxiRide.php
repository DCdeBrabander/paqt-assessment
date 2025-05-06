<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property-read \App\Models\Resident|null $resident
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiRide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiRide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiRide query()
 * @property-read \App\Models\TaxiCompany|null $company
 * @mixin \Eloquent
 */
class TaxiRide extends Model
{
    use HasFactory;

    /**
     * A ride always belongs to a single user since budget will not be split/
     * @return BelongsTo
     */
    public function resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class);
    }

    /**
     * A ride is always done by a single company
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(TaxiCompany::class);
    }
}
