<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kind');
            $table->integer('age');
            $table->text('description');
            $table->float('price',5,2);
            $table->date('startDate');
            $table->date('endDate');
            $table->string('image');
            $table->unsignedBigInteger('ownerid');

            $table->foreign('kind')->references('role')->on('pets_role');
            $table->foreign('ownerid')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
