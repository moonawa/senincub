<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('client_entreprises', function (Blueprint $table) {
            $table->integer('client_id')->unsigned();
            $table->integer('entreprises_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('client_entreprises', function(Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('client_entreprises', function(Blueprint $table) {
            $table->foreign('entreprises_id')->references('id')->on('entreprises')
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
        Schema::dropIfExists('client_entreprises');
    }
}


