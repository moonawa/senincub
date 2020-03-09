<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesPrestataireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises_prestataire', function (Blueprint $table) {
            $table->integer('entreprises_id')->unsigned();
            $table->integer('prestataire_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('entreprises_prestataire', function(Blueprint $table) {
            $table->foreign('entreprises_id')->references('id')->on('entreprises')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('entreprises_prestataire', function(Blueprint $table) {
            $table->foreign('prestataire_id')->references('id')->on('prestataires')
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
        Schema::dropIfExists('entreprises_prestataire');
    }
}
