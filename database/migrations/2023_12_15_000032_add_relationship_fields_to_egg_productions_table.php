<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEggProductionsTable extends Migration
{
    public function up()
    {
        Schema::table('egg_productions', function (Blueprint $table) {
            $table->unsignedBigInteger('eggs_id')->nullable();
            $table->foreign('eggs_id', 'eggs_fk_9307046')->references('id')->on('life_stocks');
        });
    }
}
