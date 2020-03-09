<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestatairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestataires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_complet');    
            $table->string('telephone')->unique();    
            $table->string('mail')->unique();
            $table->integer('secteur_id')->unsigned();
            $table->timestamps();

        });
        Schema::table('prestataires', function(Blueprint $table) {
            $table->foreign('secteur_id')->references('id')->on('secteurs')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestataires');
    }
}
