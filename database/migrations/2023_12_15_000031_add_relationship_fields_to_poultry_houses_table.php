<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPoultryHousesTable extends Migration
{
    public function up()
    {
        Schema::table('poultry_houses', function (Blueprint $table) {
            $table->unsignedBigInteger('poultry_house_id')->nullable();
            $table->foreign('poultry_house_id', 'poultry_house_fk_9145716')->references('id')->on('farms');
        });
    }
}
