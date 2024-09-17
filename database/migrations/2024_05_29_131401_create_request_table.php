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
        Schema::create('request', function (Blueprint $table) {
            $table->id('id_request');
            $table->uuid('id_barang')->nullable();
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onDelete('cascade');
            $table->string('jumlah');
            $table->enum('status', ['diminta', 'selesai'])->default('diminta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request');
    }
};
