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
        Schema::create('jobs_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->string('categoryName');
            $table->string('title');
            $table->string('description');
            $table->string('jobImage_path')->nullable();
            $table->string('phoneNumber');
            $table->string('email');
            $table->string('workingHours');
            $table->boolean('verified')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs_data');
    }
};
