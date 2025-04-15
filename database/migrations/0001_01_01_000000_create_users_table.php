<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Exécute la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('name'); // Nom de l'utilisateur
            $table->string('email')->unique(); // Adresse e-mail (unique)
            $table->timestamp('email_verified_at')->nullable(); // Vérification de l'email
            $table->string('password'); // Mot de passe
            $table->string('role')->default('user'); // ou nullable si tu préfères
            $table->rememberToken(); // Token pour la gestion de la session "remember me"
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
        Schema::dropIfExists('users');
    }
}
