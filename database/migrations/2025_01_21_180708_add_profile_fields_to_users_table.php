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
        Schema::table('users', function (Blueprint $table) {
            //
          
            $table->string('second_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('profession')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->string('web_url')->nullable();
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['second_name', 'phone_number', 'profession', 'profile_photo_path', 'web_url']);
        });
    }
};
