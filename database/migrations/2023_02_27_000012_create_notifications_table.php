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
    Schema::create('notifications', function (Blueprint $table) {
      $table->id()->comment("Unique notification identifier");
      $table->foreignId("notification_type_id")->nullable()->constrained()->onDelete('set null')->onUpdate("cascade");
      $table->foreignId("user_id")->constrained()->onDelete('cascade')->onUpdate("cascade");
      $table->string("content")->comment("Text content of the notitication");
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
    Schema::dropIfExists('notifications');
  }
};
