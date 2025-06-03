<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLifeStocksTable extends Migration
{
    public function up()
    {
        Schema::create('life_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('breed');
            $table->string('purpose');
            $table->date('date_of_birth')->nullable();
            $table->float('weight', 6, 2)->nullable();
            $table->date('purchase_date')->nullable();
            $table->longText('notes')->nullable();
            $table->string('health_status')->nullable();
            $table->integer('number_of_birds');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
