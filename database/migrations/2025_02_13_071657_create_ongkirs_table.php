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
        Schema::create('ongkirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ekspedisi', 255)->unique();
            $table->string('logo_ekspedisi', 255);
            $table->enum('jenis_ongkir', ['ekonomi', 'regular', 'express', 'cod', 'sameday'])->unique();
            $table->string('propinsi', 1100)->unique();
            $table->string('kota', 100)->unique();
            $table->integer('biaya_ongkir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ongkirs');
    }
};
