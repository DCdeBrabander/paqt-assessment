<?php

namespace App\Console\Commands;

use App\Enums\ResidentBudgetStatus;
use App\Models\ResidentTaxiBudget;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ResetResidentBudgets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-resident-budgets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset enabled and valid resident\'s yearly budgets';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $updated = ResidentTaxiBudget::where('valid_until', '<=', Carbon::now())
            ->where('status', ResidentBudgetStatus::Active)
            ->update([
                'valid_until' => Carbon::now()->addYear(),
                'current_amount' => ResidentTaxiBudget::MAX_BUDGET
            ]);

        if ($updated) {
            $this->info("$updated Resident Budgets updated successfully.");
        } else {
            $this->warn('No Resident budgets has been updated.');
        }

    }
}
