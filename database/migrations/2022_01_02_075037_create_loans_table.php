<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('group')->nullable();
            $table->string('initiator',20);
            $table->string('type', 50);
            $table->unsignedInteger('amount')->nullable();
            $table->boolean('zs')->nullable();
            $table->string('pathZS')->nullable();
            $table->boolean('pd')->nullable();
            $table->string('pathPD')->nullable();
            $table->boolean('iab')->nullable();
            $table->string('pathIAB')->nullable();
            $table->boolean('ukk')->nullable();
            $table->string('pathUKK')->nullable();
            $table->string('creator');
            $table->text('description')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('loans');
    }
}
