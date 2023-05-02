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
    Schema::create('friends', function (Blueprint $table) {
      $table->id()->comment("Unique friends relation identifier");
      $table->foreignId("user_id")->constrained()->onDelete('cascade')->onUpdate("cascade");
      $table->foreignId("friend_id")->constrained("users")->onDelete('cascade')->onUpdate("cascade");
      $table->boolean("is_requested")->comment("Shows if the friend request has been placed");
      $table->boolean("is_accepted")->comment("Shows if the friend request has been accepted");
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
    Schema::dropIfExists('friends');
  }
};
