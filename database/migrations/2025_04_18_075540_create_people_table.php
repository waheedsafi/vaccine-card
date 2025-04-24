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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('passport_number')->unique();
            $table->string('full_name');
            $table->string('father_name');
            $table->string('date_of_birth');
            $table->string('phone')->nullable();
            $table->string('passport_block_time')->default('20')->comment('in minutes');
            $table->unsignedBigInteger('nid_type_id');
            $table->foreign('nid_type_id')->references('id')->on('nid_types')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')->references('id')->on('genders')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('nationality_id');
            $table->foreign('nationality_id')->references('id')->on('nationalities')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('epi_user_id');
            $table->foreign('epi_user_id')->references('id')->on('epi_users')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->timestamps();
            $table->index(["passport_number"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
