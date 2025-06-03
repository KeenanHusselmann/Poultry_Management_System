<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmsTable extends Migration
{
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('farm_name');
            $table->string('farm_location');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
