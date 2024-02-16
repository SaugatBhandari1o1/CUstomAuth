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
        Schema::create('login_customizations', function (Blueprint $table) {

            $table->id();
            $table->string('login_box_color')->nullable();
            $table->string('background_image')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('text_color')->nullable();
            $table->string('font_family')->nullable();
            $table->text('additional_styles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_customizations');

    }
};
