<?php

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
    Schema::create('locations', function (Blueprint $table) {
      $table->id()->comment("Unique location identifier");
      $table->foreignId("city_id")->constrained("cities")->onUpdate("cascade");
      $table->foreignId("country_id")->constrained("countries")->onUpdate("cascade");
      $table->string("notes")->nullable()->comment("Notes");
      $table->boolean("is_active")->default(1)->comment("Shows if it's active");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('locations');
  }
};
