<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_perms', function (Blueprint $table) {
           $table->bigIncrements('id')->unique();
           $table->bigInteger('admin_id')->unsigned();
           $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->string('perm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_perms');
    }
}
