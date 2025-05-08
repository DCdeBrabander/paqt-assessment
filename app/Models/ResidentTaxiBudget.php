<?php

namespace App\Models;

use App\Enums\ResidentBudgetStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResidentTaxiBudget extends Model
{
    /** @use HasFactory<\Database\Factories\ResidentTaxiBudgetFactory> */
    use HasFactory;

    public const MAX_BUDGET = 1000;

    protected $table = 'resident_budgets';

    protected $fillable = [
        'status',
        'current_amount',
        'valid_until',
    ];

    protected $casts = [
      'status' => ResidentBudgetStatus::class,
    ];

    public function resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class);
    }
}
