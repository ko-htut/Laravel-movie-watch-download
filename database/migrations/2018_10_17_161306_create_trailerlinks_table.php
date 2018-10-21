<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrailerlinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trailerlinks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('web_name');
            $table->string('web_url');
            $table->integer('trailerlinkable_id');
            $table->string('trailerlinkable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trailerlinks');
    }
}
