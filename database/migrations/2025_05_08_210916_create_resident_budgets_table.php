<?php

use App\Enums\ResidentBudgetStatus;
use App\Models\Resident;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resident_budgets', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Resident::class);
            $table->enum('status', array_column(ResidentBudgetStatus::cases(), 'value'))
                ->default(ResidentBudgetStatus::Active)
                ->index();
            $table->integer('current_amount')
                ->default(0);
            $table->integer('max_amount')
                ->default(0);
            $table->dateTime('valid_until')
                ->default(Carbon::now()->addYear())
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resident_budgets');
    }
};
