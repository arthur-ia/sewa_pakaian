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
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100)->unique()->nullable(false);
            $table->enum('jk', ['L', 'P']);
            $table->string('email')->unique()->nullable(false);
            $table->string('password', 30)->nullable(false);
            $table->date('tgl_lahir');
            $table->string('telepon', 15)->nullable(false);
            $table->string('propinsi1')->nullable(false);
            $table->string('kota1')->nullable(false);
            $table->string('alamat1')->nullable(false);
            $table->string('kodepos1')->nullable(false);
            $table->string('propinsi2')->nullable(false);
            $table->string('kota2')->nullable(false);
            $table->string('alamat2')->nullable(false);
            $table->string('kodepos2')->nullable(false);
            $table->string('propinsi3')->nullable(false);
            $table->string('kota3')->nullable(false);
            $table->string('alamat3')->nullable(false);
            $table->string('kodepos3')->nullable(false);
            $table->string('kartu_id')->nullable(true);
            $table->string('foto')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
