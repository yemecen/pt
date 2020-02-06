<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmDetailAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cm_detail_additionals', function (Blueprint $table) {
            $table->Increments('ID');
            $table->integer('CmDetailID')->unsigned();
            $table->string('FileName',250);

            $table->foreign('CmDetailID')->references('ID')->on('cm_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cm_detail_additionals');
    }
}
