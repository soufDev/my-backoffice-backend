<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table){
            $table->increments('id');
            $table->string('last_name', 50);
            $table->string('first_name', 50);
            $table->date('birth_date');

            $table->string('address');
            $table->string('about');
            $table->string('phone_number');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('github');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
