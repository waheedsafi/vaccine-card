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
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number');
            $table->date('registration_date');
            $table->string('volume');
            $table->string('page');
            $table->unsignedBigInteger('vaccine_center_id');
            $table->foreign('vaccine_center_id')->references('id')->on('vaccine_centers')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('vaccine_type_id');
            $table->foreign('vaccine_type_id')->references('id')->on('vaccine_types')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('epi_user_id');
            $table->foreign('epi_user_id')->references('id')->on('epi_users')
                ->onUpdate('cascade')
                ->onDelete('no action');    
        
            $table->unsignedBigInteger('visit_id');
            $table->foreign('visit_id')->references('id')->on('visits')
                ->onUpdate('cascade')
                ->onDelete('no action');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccines');
    }
};
