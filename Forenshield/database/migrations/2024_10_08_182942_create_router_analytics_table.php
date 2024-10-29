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
        Schema::create('router_analytics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crime_scene');
            $table->string('ip');
            $table->string('mac');
            $table->string('hostname');
            $table->string('vendor');
            $table->string('latency');
            $table->string('open_ports');
            $table->string('os_guess');
            $table->string('first_seen');
            $table->string('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('router_analytics');
    }
};
