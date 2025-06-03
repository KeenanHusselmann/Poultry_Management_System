<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPesticidesTable extends Migration
{
    public function up()
    {
        Schema::table('pesticides', function (Blueprint $table) {
            $table->unsignedBigInteger('life_stock_id')->nullable();
            $table->foreign('life_stock_id', 'life_stock_fk_9307047')->references('id')->on('life_stocks');
        });
    }
}
