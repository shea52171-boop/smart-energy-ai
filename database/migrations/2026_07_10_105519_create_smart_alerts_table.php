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
        Schema::create('smart_alerts', function (Blueprint $table) {

            $table->id();

            $table->foreignId('machine_id');

            $table->float('temperature');

            $table->float('current');

            $table->float('voltage');

            $table->float('power');

            $table->integer('health_score');

            $table->string('prediction');

            $table->string('risk_level');

            $table->float('confidence');

            $table->text('recommendation');

            $table->enum('status', ['OPEN', 'ACKNOWLEDGED', 'RESOLVED'])
                  ->default('OPEN');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smart_alerts');
    }
};