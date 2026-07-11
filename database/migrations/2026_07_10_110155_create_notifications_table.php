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
    Schema::create('notifications', function (Blueprint $table) {

        $table->id();

        $table->foreignId('smart_alert_id');

        $table->string('recipient');

        $table->longText('message');

        $table->enum('status',[
            'Pending',
            'Delivered',
            'Failed',
            'Read'
        ])->default('Pending');

        $table->timestamp('sent_at')->nullable();

        $table->timestamp('read_at')->nullable();

        $table->timestamps();
    });
}
};
