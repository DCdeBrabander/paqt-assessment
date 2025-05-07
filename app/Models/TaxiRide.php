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
 * @property int $id
 * @property int $resident_id
 * @property int $taxi_company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TaxiRideFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiRide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiRide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiRide whereResidentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiRide whereTaxiCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxiRide whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaxiRide extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_address',
        'to_address',
        'taxi_company_id',
        'resident_id',
    ];

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
    public function taxiCompany(): BelongsTo
    {
        return $this->belongsTo(TaxiCompany::class);
    }
}
