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
            $table->Increments('ID');
            $table->string('Title', 250);
            $table->integer('ResponsibleUserID');
            $table->text('Description', 250);
            $table->integer('TypeID');
            $table->integer('SystemID');
            $table->integer('SubSystemID');
            $table->integer('LevelID');
            $table->integer('PrecedenceID');
            $table->string('Mail', 250);
            $table->timestamps();
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
