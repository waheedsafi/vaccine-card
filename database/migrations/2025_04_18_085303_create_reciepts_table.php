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
            $table->integer('download_count');
            $table->string('issue_date');
            $table->boolean('is_downloaded')->default(false);
            $table->decimal('paid_amount', 15, 2);
            $table->unsignedBigInteger('finance_user_id');
            $table->foreign('finance_user_id')->references('id')->on('finance_users')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('vaccine_payment_id');
            $table->foreign('vaccine_payment_id')->references('id')->on('vaccine_payments')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->timestamps();
            $table->index(["vaccine_payment_id", 'finance_user_id'], 'vaccine_payment_finance_user_id');
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
