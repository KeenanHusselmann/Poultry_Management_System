<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInsecticidesTable extends Migration
{
    public function up()
    {
        Schema::table('insecticides', function (Blueprint $table) {
            $table->unsignedBigInteger('life_stock_id')->nullable();
            $table->foreign('life_stock_id', 'life_stock_fk_9307048')->references('id')->on('life_stocks');
        });
    }
}
