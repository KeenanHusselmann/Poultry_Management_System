<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoultryHousesTable extends Migration
{
    public function up()
    {
        Schema::create('poultry_houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('capacity')->nullable();
            $table->integer('number_of_birds')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
