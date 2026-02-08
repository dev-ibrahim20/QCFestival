<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('university');
            $table->string('college');
            $table->string('section');
            $table->string('academic_year');
            $table->char('phone_number', 11);
            $table->char('whatsapp_number', 11);
            $table->char('national_id', 14)->unique();
            $table->date('date_of_birth');
            $table->integer('age');
            $table->string('participating_field');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
