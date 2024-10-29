<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('signed_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_swap_id');  // Changed from 'swap_id' to 'home_swap_id'
            $table->unsignedBigInteger('user_id');
            $table->string('document_path');
            $table->timestamps();

            $table->foreign('home_swap_id')->references('id')->on('home_swaps')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signed_documents');
    }
};
