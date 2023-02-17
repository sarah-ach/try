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
        Schema::create('trasabilite', function (Blueprint $table) {
            $table->id();
            $table->string('id_operateur');
            $table->string('splice_name');
            $table->string('location');
            $table->string('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trasabilite');
    }
};
