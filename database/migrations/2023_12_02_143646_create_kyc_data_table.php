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
        Schema::create('kyc_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->string('fullName');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('homeAddress');
            $table->date('dateOfBirth');
            $table->string('documentImage_path')->nullable();
            $table->boolean('verified')->default('0');
            $table->timestamps();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyc_data');
    }
};
