<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->Increments('ID')->unsigned();
            $table->string('Title', 250);
            $table->unsignedBigInteger('UserID')->unsigned();
            $table->integer('ResponsibleUserID')->unsigned()->nullable();
            $table->text('Description', 250);
            $table->integer('TypeID')->unsigned();
            $table->integer('SystemID')->unsigned();
            $table->integer('SubSystemID')->unsigned();
            $table->integer('LevelID')->unsigned();
            $table->integer('PrecedenceID')->unsigned();
            $table->unsignedInteger('StatID')->unsigned();
            $table->string('Mail', 250)->nullable();
            $table->timestamps();

            $table->foreign('UserID')->references('id')->on('users');
            $table->foreign('TypeID')->references('ID')->on('types');
            $table->foreign('SystemID')->references('ID')->on('systems');
            $table->foreign('SubSystemID')->references('ID')->on('sub_systems');
            $table->foreign('LevelID')->references('ID')->on('levels');
            $table->foreign('PrecedenceID')->references('ID')->on('precedences');
            $table->foreign('StatID')->references('ID')->on('stats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms');
    }
}
