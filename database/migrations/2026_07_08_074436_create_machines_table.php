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
      Schema::create('machines', function (Blueprint $table) {
        $table->id();
        $table->string('kode_mesin')->unique();
        $table->string('nama_mesin');
        $table->string('lokasi');
        $table->string('jenis_mesin');
        $table->integer('daya_maksimal');
        $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
