<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAuthorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_authorizations', function (Blueprint $table) {
            $table->Increments('ID');
            $table->unsignedBigInteger('UserID');
            $table->unsignedInteger('AuthorizationID');

            $table->foreign('UserID')->references('id')->on('users');
            $table->foreign('AuthorizationID')->references('ID')->on('authorizations');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_authorizations');
    }
}
