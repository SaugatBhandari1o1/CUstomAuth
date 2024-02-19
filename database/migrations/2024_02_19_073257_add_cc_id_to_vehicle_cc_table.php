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
        Schema::table('vehicle_cc', function (Blueprint $table) {
            $table->unsignedBigInteger('cc_id')->nullable();    

            $table->foreign('cc_id')->references('id')->on('cc')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicle_cc', function (Blueprint $table) {
            $table->dropForeign(['cc_id']);
            $table->dropColumn('cc_id');
        });
    }
};
