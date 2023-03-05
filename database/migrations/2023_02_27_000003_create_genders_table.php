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
    Schema::create('genders', function (Blueprint $table) {
      $table->id()->comment("Unique gender identifier");
      $table->string("name")->comment("Name of the gender");
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
    Schema::dropIfExists('genders');
  }
};
