<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stats', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->primary('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->bigInteger('views')->unsigned()->default(0);
            $table->bigInteger('liked')->unsigned()->default(0);
            $table->bigInteger('comments')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stats');
    }
}
