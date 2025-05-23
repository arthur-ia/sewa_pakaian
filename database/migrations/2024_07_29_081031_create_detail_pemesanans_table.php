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
        Schema::create('detail_pemesanans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pemesanan');
            $table->foreign('id_pemesanan')->references('id')->on('pemesanans')->
            onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_pakaian');
            $table->foreign('id_pakaian')->references('id')->
            on('pakaians')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah_sewa');
            $table->bigInteger('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pemesanans');
    }
};
