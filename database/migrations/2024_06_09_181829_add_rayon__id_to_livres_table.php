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
        Schema::table('livres', function (Blueprint $table) {
            $table->unsignedBigInteger('rayon_id');
            $table->foreign('rayon_id')->references('id')->on('rayons');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('livres', function (Blueprint $table) {
            $table->dropForeign(['rayon_id']); // Supprime la clé étrangère
            $table->dropColumn('rayon_id'); // Supprime la colonne rayon_id
        });
    }
};
