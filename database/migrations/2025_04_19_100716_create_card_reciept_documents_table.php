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
        Schema::create('card_reciept_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id')->references('id')->on('documents')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('vaccine_card_id');
            $table->foreign('vaccine_card_id')->references('id')->on('vaccine_cards')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('reciept_id');
            $table->foreign('reciept_id')->references('id')->on('reciepts')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->timestamps();
            $table->index(["document_id", 'vaccine_card_id', 'reciept_id'], 'document_vaccine_card_reciept_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_reciept_documents');
    }
};
