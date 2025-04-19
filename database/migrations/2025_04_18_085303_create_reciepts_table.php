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
        Schema::create('reciepts', function (Blueprint $table) {
            $table->id();
            $table->integer('retry_count');
            $table->date('issue_date');
            $table->boolean('is_download');
            $table->unsignedBigInteger('vaccine_payment_id')->unique();
            $table->foreign('vaccine_payment_id')->references('id')->on('vaccine_payments')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('finance_user_id');
            $table->foreign('finance_user_id')->references('id')->on('finance_users')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id')->references('id')->on('documents')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->timestamps();
            $table->index(["vaccine_payment_id"]);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reciepts');
    }
};
