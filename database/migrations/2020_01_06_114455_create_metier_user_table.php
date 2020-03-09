<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetierUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metier_user', function (Blueprint $table) {
            $table->integer('metier_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

        });
        Schema::table('metier_user', function(Blueprint $table) {
            $table->foreign('metier_id')->references('id')->on('metiers')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('metier_user', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('metier_user');
    }
}
