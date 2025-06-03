<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedManagmentsTable extends Migration
{
    public function up()
    {
        Schema::create('feed_managments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('notes')->nullable();
            $table->datetime('feeding_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
