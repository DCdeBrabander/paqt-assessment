<?php

use App\Models\Resident;
use App\Models\TaxiCompany;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('taxi_rides', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Resident::class);
            $table->foreignIdFor(TaxiCompany::class);

            $table->string('from_address');
            $table->string('to_address');

            # something with budget
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxi_rides');
    }
};
