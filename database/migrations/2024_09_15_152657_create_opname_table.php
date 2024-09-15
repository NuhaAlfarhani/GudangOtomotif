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
        Schema::create('opname', function (Blueprint $table) {
            $table->uuid('id_barang')->primary();
            $table->string('nama');
            $table->integer('stok');
            $table->integer('stok_sistem')->nullable();
            $table->text('deskripsi');
            $table->string('kendaraan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opname');
    }
};
