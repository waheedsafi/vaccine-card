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
        Schema::create('card_download_by_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('epi_user_id');
            $table->foreign('epi_user_id')->references('id')->on('epi_users')
                ->onUpdate('cascade')
                ->onDelete('no action');

            $table->unsignedBigInteger('vaccine_card_id');
            $table->foreign('vaccine_card_id')->references('id')->on('vaccine_cards')
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
        Schema::dropIfExists('card_download_by_users');
    }
};
