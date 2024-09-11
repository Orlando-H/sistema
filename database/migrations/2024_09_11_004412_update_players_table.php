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
        Schema::table('players', function (Blueprint $table) {
          
            $table->string('name');
            $table->string('lastname');
            $table->integer('quality');
            $table->integer('potential');
            $table->integer('value');
            $table->integer('age');
            $table->string('position');
            $table->string('team');
            $table->string('image');
          
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
