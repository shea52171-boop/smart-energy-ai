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
    Schema::create('energy_logs', function (Blueprint $table) {

        $table->id();

        $table->foreignId('machine_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->decimal('voltage',8,2);

        $table->decimal('current',8,2);

        $table->decimal('power',8,2);

        $table->decimal('temperature',8,2);

        $table->decimal('duration',8,2);

        $table->decimal('energy',8,2);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('energy_logs');
    }
};
