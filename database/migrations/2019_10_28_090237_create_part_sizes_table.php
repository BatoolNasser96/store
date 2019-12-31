<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('part_id')->unsigned();
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');
            $table->bigInteger('size_id')->unsigned();
            $table->foreign('size_id')->references('id')->on('sizes');
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
        Schema::dropIfExists('part_sizes');
    }
}
