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
        Schema::create('vaccine_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('download_count');
            $table->string('issue_date');
            $table->boolean('is_downloaded')->default(false);
            $table->unsignedBigInteger('vaccine_payment_id')->unique();
            $table->foreign('vaccine_payment_id')->references('id')->on('vaccine_payments')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('epi_user_id');
            $table->foreign('epi_user_id')->references('id')->on('epi_users')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->timestamps();
            $table->index(["vaccine_payment_id", 'epi_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccine_cards');
    }
};
