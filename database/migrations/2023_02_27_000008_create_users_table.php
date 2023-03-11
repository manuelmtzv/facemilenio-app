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
    Schema::create('users', function (Blueprint $table) {
      $table->id()->comment("Unique user identifier");
      $table->string("username")->unique()->comment("Unique user username");
      $table->string("name")->comment("User name");
      $table->string("surname")->comment("User surname");
      $table->string("email")->unique()->comment("User email");
      $table->string("password")->comment("User password");
      $table->foreignId("role_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
      $table->foreignId("gender_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
      $table->date("birthdate")->comment("User birthdate");
      $table->tinyText("url_profile")->nullable()->comment("URL of the profile image of the user");
      $table->tinyText("biography")->comment("User autobiography");
      $table->foreignId("location_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
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
    Schema::dropIfExists('users');
  }
};
