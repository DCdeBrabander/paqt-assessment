<?php

use App\Models\City;
use App\Models\CityArea;
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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->string('address');

            # Better to probably just have address table with areas and city and have only one foreign ID.
            # But because of time and to just get the endpoints working, we will do it like this for now ;-)
            $table->foreignIdFor(City::class);
            $table->foreignIdFor(CityArea::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
