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
        Schema::create('epi_users', function (Blueprint $table) {
            $table->id();
            $table->string('registeration_number');
            $table->string('full_name');
            $table->string('username')->unique();
            $table->unsignedBigInteger('email_id')->nullable();
            $table->foreign('email_id')->references('id')->on('emails')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->string('password');
            $table->string('profile')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('disabled_parmanently')->default(false);
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->foreign('contact_id')
                ->references('id')->on('contacts')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')
                ->references('id')->on('zones')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')
                ->references('id')->on('provinces')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')
                ->references('id')->on('genders')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('user_letter_of_introduction_id')->nullable();
            $table->foreign('user_letter_of_introduction_id')->references('id')->on('documents')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('job_id')->nullable();
            $table->foreign('job_id')->references('id')->on('model_jobs')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->foreign('destination_id')->references('id')->on('destinations')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->index(["email_id", "job_id", "destination_id", "role_id", 'zone_id']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epi_users');
    }
};
