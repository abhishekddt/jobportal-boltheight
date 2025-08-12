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
        Schema::create('employment_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('experience')->nullable();
            $table->string('experience_month')->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('job_title', 255)->nullable();
            $table->date('joining_date')->nullable();
            $table->decimal('current_salary', 12, 2)->nullable();
            $table->string('notice_period', 50)->nullable();
            $table->text('job_profile')->nullable();
            $table->tinyInteger('is_current_employment')->default(0)->comment('0 => No, 1 => Yes');
            $table->string('employment_type', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment_details');
    }
};
