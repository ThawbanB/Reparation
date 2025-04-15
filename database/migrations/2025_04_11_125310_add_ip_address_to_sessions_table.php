<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIpAddressToSessionsTable extends Migration
{
    /**
     * Exécutez la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {
            // Ajouter la colonne 'ip_address' si elle n'existe pas déjà
            $table->string('ip_address')->nullable();
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
            // Supprimer la colonne 'ip_address' si la migration est annulée
            $table->dropColumn('ip_address');
        });
    }
}
