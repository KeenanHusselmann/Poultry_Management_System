<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('health_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('record_date');
            $table->longText('notes')->nullable();
            $table->longText('desc_of_sick')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
