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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration', 40)->unique();
            $table->string('codercp')->unique();
            $table->string('cin', 7)->unique();
            $table->string('name', 20);
            $table->string('familyname', 20);
            $table->date('dateofbirth');
            $table->string('country', 50);
            $table->string('picture', 255);
            $table->string('university', 50);
            $table->string('speciality', 50);
            $table->string('level', 20);
            $table->string('cost', 20);
            $table->string('amountpay', 20);
            $table->string('amountremaining', 20);
            $table->date('integrationdate');
            $table->date('enddate');  
            $table->string('phone', 35)->unique();
            $table->string('email', 50)->unique();
            $table->string('password', 255);
            $table->integer('statut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
