<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Exécute la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // L'ID de la session
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Utilisateur lié
            $table->longText('payload'); // Données de session
            $table->integer('last_activity'); // Dernière activité
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Annule la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
