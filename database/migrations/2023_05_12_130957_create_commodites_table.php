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
        Schema::create('commodites', function (Blueprint $table) {
            $table->id();
            $table->enum('equipement', ['Wi-Fi', 'Tv', 'Climatisation', 'Mini-bar', 'Coffre-fort']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commodites');
    }
};
