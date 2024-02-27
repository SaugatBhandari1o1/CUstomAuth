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
        Schema::create('uploads', function (Blueprint $table) {
            $table->bigIncrements('uid');
            $table->string('name');
            $table->string('email');
            $table->string('status');
            $table->string('education');
            $table->string('document');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};