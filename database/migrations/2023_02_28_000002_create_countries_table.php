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
    Schema::create('countries', function (Blueprint $table) {
      $table->id()->comment("Id identificador de la tabla países.");
      $table->string("name");
      $table->string("notes")->nullable()->comment("Notas");
      $table->boolean("is_active")->default(1)->comment("Muestra si está activo.");
      // $table->foreignId("created_by")->constrained()->unsigned()->nullable()->comment("Usuario que lo ha creado.");
      // $table->foreignId("updated_by")->constrained()->unsigned()->nullable()->comment("Usuario que lo ha creado.");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('countries');
  }
};
