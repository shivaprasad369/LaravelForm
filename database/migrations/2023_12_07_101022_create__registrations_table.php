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
        Schema::create('_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lname');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('Os');
            $table->string('Browser');
            $table->string('ip');
            $table->string('mac');
            $table->string('date');
           
        });
        Schema::rename('_registrations','registrations');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_registrations');
    }
};
