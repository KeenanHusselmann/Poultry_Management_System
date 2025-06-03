<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHealthRecordsTable extends Migration
{
    public function up()
    {
        Schema::table('health_records', function (Blueprint $table) {
            $table->unsignedBigInteger('live_stock_id')->nullable();
            $table->foreign('live_stock_id', 'live_stock_fk_9307234')->references('id')->on('life_stocks');
            $table->unsignedBigInteger('disease_id')->nullable();
            $table->foreign('disease_id', 'disease_fk_9307235')->references('id')->on('diseases');
        });
    }
}
