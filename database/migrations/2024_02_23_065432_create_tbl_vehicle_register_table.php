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
        Schema::create('tbl_vehicle_register', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('cc');
            $table->year('year');
            $table->string('registeration_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_vehicle_register');
    }
};
