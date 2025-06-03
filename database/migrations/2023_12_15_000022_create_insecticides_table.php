<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsecticidesTable extends Migration
{
    public function up()
    {
        Schema::create('insecticides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->date('purchase_date')->nullable();
            $table->float('quantity', 10, 2)->nullable();
            $table->string('manufacturer');
            $table->longText('usage_instructions')->nullable();
            $table->longText('safety_instructions')->nullable();
            $table->date('expiry_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
