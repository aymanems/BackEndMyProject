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
        Schema::create('supervisors', function (Blueprint $table) {
            $table->id();
            $table->string('registration', 20)->unique();
            $table->string('code', 255)->unique();
            $table->string('status', 15);
            $table->string('cin', 7)->unique();
            $table->string('name', 20);
            $table->string('familyname', 20);
            $table->date('dateofbirth');
            $table->string('country', 50);
            $table->string('picture', 255);
            $table->string('university', 50);
            $table->string('speciality', 50);
            $table->string('level', 20);
            $table->string('integrationdate', 255);
            $table->string('phone', 13)->unique();
            $table->string('status', 30)->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supervisors');
    }
};
