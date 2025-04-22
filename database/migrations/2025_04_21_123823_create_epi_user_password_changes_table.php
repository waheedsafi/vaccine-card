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
        Schema::create('epi_user_password_changes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('target_user_id');
            $table->foreign('target_user_id')->references('id')->on('epi_users')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('affected_user_id')->comment('how changed the password');
            $table->foreign('affected_user_id')->references('id')->on('epi_users')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id')->references('id')->on('documents')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->timestamps();
            $table->index(["target_user_id", "affected_user_id", "document_id"], 'target_user_affected_user_document_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epi_user_password_changes');
    }
};
