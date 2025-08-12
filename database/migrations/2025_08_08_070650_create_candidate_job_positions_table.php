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
        Schema::create('candidate_job_positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_user_id')->nullable();
            $table->foreign('candidate_user_id')
                ->references('id')
                ->on('condidate_details')
                ->onDelete('cascade');
            $table->string('preferred_location')->nullable();
            $table->string('date_of_last_flight')->nullable();
            $table->string('latest_fleet')->nullable();
            $table->string('latest_rank')->nullable();
            $table->string('certificate_no')->nullable();
            $table->string('country_of_licence')->nullable();
            $table->string('licence_no')->nullable();
            $table->string('total_hours_on_fleet')->nullable();
            $table->string('valid_medical')->nullable();
            $table->string('non_flying_position')->nullable();
            $table->string('latest_current_company')->nullable();
            $table->string('cabin_crew_height')->nullable();
            $table->string('cabin_crew_weight')->nullable();
            $table->string('engineer_latest_airframe')->nullable();
            $table->string('engineer_current_engine_type')->nullable();
            $table->date('dispatcher_last_flight')->nullable();
            $table->string('dispatcher_approval')->nullable();
            $table->string('dispatcher_approval_authority')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_job_positions');
    }

};