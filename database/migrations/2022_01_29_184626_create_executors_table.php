<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executors', function (Blueprint $table) {
            $table->foreignID('loan_id')->constrained();
            $table->foreign('ukk')->references('id')->on('users');
            $table->integer('pd')->nullable();
            $table->integer('zs')->nullable();
            $table->integer('iab')->nullable();
            $table->integer('km')->nullable();
            $table->boolean('notify_ukk_main')->nullable();
            $table->boolean('published')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('executors');
    }
}
