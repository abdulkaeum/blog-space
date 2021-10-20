<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRatingsToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('r_1')->default(0)->nullable();
            $table->integer('r_2')->default(0)->nullable();
            $table->integer('r_3')->default(0)->nullable();
            $table->integer('r_4')->default(0)->nullable();
            $table->integer('r_5')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Post', function (Blueprint $table) {
            //
        });
    }
}
