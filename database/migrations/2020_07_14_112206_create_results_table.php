<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('query_id');
            $table->integer('position');
            $table->string('title');
            $table->string('link');
            $table->longText('snippet')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('results');
    }
}
