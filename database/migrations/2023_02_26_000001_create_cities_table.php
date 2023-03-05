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
    Schema::create('cities', function (Blueprint $table) {
      $table->id()->comment("Unique city identifier");
      $table->string("name")->comment("Name of the city");
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
    Schema::dropIfExists('cities');
  }
};
