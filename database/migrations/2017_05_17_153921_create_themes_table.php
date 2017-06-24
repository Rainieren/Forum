<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->string('theme_title', 55)->unique();
            $table->text('theme_description');
            $table->integer('user_id')->unsigned();
            $table->increments('id');
            $table->timestamps();

            // Primary key in andere tabel als sleutel verwijzing
            //$table->foreign('theme_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
}
