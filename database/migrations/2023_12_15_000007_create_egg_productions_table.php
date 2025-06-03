<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEggProductionsTable extends Migration
{
    public function up()
    {
        Schema::create('egg_productions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('eggs_produced')->nullable();
            $table->date('date')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
