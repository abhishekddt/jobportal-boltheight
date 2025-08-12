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
        Schema::create('employer_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->text('ceo_name')->nullable();
            $table->text('industry')->nullable();
            $table->text('ownership_type')->nullable();
            $table->text('company_size')->nullable();
            $table->text('established_year')->nullable();
            $table->text('location')->nullable();
            $table->text('second_office_location')->nullable();
            $table->text('employer_detail')->nullable();
            $table->text('website')->nullable();
            $table->text('facebook_url')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_details');
    }
};
