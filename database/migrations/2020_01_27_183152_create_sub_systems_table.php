<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_systems', function (Blueprint $table) {
            $table->Increments('ID');
            $table->integer('SystemID')->unsigned();
            $table->string('Name', 100);

            $table->foreign('SystemID')->references('ID')->on('systems');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_systems');
    }
}
