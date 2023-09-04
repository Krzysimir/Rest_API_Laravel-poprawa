<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Surname');
            $table->string('Phone_Number');
            $table->string('Email_Adress');
            $table->string('Country');
            $table->string('City');
            $table->string('Street');
            $table->string('Apartment_Number');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
