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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fruit_id')->constrained('fruits', 'id')->onDelete('restrict');
            $table->string('sku');
            $table->string('drive');
            $table->string('loading_area');
            $table->datetime('transport_departure');
            $table->datetime('transport_arrival');
            $table->string('vehicle_number');
            $table->string('driver');
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
