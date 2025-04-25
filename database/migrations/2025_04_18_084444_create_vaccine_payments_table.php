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
        Schema::create('vaccine_payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_uuid');
            $table->decimal('paid_amount', 15, 2);
            $table->unsignedBigInteger('visit_id')->unique();
            $table->foreign('visit_id')->references('id')->on('visits')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('payment_status_id');
            $table->foreign('payment_status_id')->references('id')->on('payment_statuses')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('finance_user_id');
            $table->foreign('finance_user_id')->references('id')->on('finance_users')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('system_payment_id');
            $table->foreign('system_payment_id')->references('id')->on('system_payments')
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
        Schema::dropIfExists('vaccine_payments');
    }
};
