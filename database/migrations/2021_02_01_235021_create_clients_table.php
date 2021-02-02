<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_type');
            $table->foreign('id_type')->references('id')->on('id_types');
            $table->string('document',30);
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->string('first_surname',30);
            $table->string('last_surname',30);
            $table->string('address',100);
            $table->integer('phone');
            $table->string('e-mail',50);
            $table->string('employment',50);
            $table->unsignedBigInteger('id_city');
            $table->foreign('id_city')->references('id')->on('cities');
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
        Schema::dropIfExists('clients');
    }
}
