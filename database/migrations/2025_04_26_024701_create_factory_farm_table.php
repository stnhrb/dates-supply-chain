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
        Schema::create('app.factory_farm', function (Blueprint $table) {
           $table->unsignedBigInteger('factory_id');
           $table->unsignedBigInteger('farm_id');
           $table->foreign('factory_id')->references('id')->on('app.factories')->onDelete('cascade');
           $table->foreign('farm_id')->references('id')->on('app.farms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factory_farm');
    }
};
