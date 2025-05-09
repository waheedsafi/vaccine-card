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
        Schema::create('receipt_download_by_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('finance_user_id');
            $table->foreign('finance_user_id')->references('id')->on('finance_users')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('receipt_id');
            $table->foreign('receipt_id')->references('id')->on('reciepts')
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
        Schema::dropIfExists('receipt_download_by_users');
    }
};
