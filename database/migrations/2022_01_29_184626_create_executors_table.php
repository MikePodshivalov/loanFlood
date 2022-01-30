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
            $table->string('ukk', 20)->nullable();
            $table->string('pd', 20)->nullable();
            $table->string('zs', 20)->nullable();
            $table->string('iab', 20)->nullable();
            $table->string('km', 20)->nullable();
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
