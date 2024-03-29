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
        Schema::create('administrators', function (Blueprint $table) {
            $table->id();
            $table->string('registration', 20)->unique();
            $table->string('recoverycode')->unique();
            $table->string('cin', 20)->unique();
            $table->string('name', 20);
            $table->string('familyname', 20);
            $table->date('dateofbirth');
            $table->string('country', 50);
            $table->string('picture', 255);
            $table->string('phone', 35)->unique();
            $table->string('status', 30)->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrators');
    }
};
