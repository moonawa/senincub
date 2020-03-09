<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestataireTacheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestataire_tache', function (Blueprint $table) {       
            $table->increments('id');
            $table->integer('prestataire_id')->unsigned();
            $table->integer('tache_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('prestataire_tache', function(Blueprint $table) {
            $table->foreign('prestataire_id')->references('id')->on('prestataires')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('prestataire_tache', function(Blueprint $table) {
            $table->foreign('tache_id')->references('id')->on('taches')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestataire_tache');
    }
}
