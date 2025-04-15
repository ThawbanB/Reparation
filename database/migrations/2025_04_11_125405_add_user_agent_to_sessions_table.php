<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserAgentToSessionsTable extends Migration
{
    /**
     * Exécutez la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {
            // Ajouter la colonne 'user_agent' si elle n'existe pas déjà
            $table->string('user_agent')->nullable();
        });
    }

    /**
     * Annulez la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sessions', function (Blueprint $table) {
            // Supprimer la colonne 'user_agent' si la migration est annulée
            $table->dropColumn('user_agent');
        });
    }
}
