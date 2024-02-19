<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("cc", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_cc_id');
            $table->string("cc");
            $table->timestamps();

            $table->Foreign('vehicle_cc_id')->references('id')->on('vehicle_cc')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cc');
    }
};
