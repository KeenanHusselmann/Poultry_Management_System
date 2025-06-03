<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFeedManagmentsTable extends Migration
{
    public function up()
    {
        Schema::table('feed_managments', function (Blueprint $table) {
            $table->unsignedBigInteger('livestock_id')->nullable();
            $table->foreign('livestock_id', 'livestock_fk_9307130')->references('id')->on('life_stocks');
        });
    }
}
