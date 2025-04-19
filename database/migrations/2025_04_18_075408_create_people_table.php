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
            $table->string('phone');
            $table->string('nid_type_id');
            $table->foreign('nid_type_id')->references('id')->on('nid_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('geneder_id');
            $table->foreign('geneder_id')->references('id')->on('geneders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('country_id');
            $table->foreign('country_id')->references('id')->on('countries')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('epi_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            $table->index([ "passport_number"]);

            
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
