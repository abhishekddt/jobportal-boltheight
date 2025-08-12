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
        Schema::create('condidate_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->text('father_name')->nullable();
            $table->dateTime(column: 'date_of_birth')->nullable();
            $table->text('gender')->nullable();
            $table->json('skills')->nullable();
            $table->json('language')->nullable();
            $table->text('marital_status')->nullable();
            $table->text('nationality')->nullable();
            $table->text('national_id_card')->nullable();
            $table->text('experience')->nullable();
            $table->text('career_level')->nullable();
            $table->text('functional_area')->nullable();
            $table->text('current_salary')->nullable();
            $table->text('expected_salary')->nullable();
            $table->text('salary_currency')->nullable();
            $table->text('facebook_url')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->text('availability')->comment('Immediate, not Immediate')->nullable();
            $table->dateTime('available_at')->nullable();
            $table->text('address')->nullable();
            $table->text('field')->comment('aviation, non aviation')->nullable();
            $table->bigInteger('is_experienced')->comment('0 = fresher, 1 = experienced')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condidate_details');
    }
};
