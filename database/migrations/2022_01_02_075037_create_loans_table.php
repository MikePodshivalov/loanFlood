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
            $table->string('inn',12);
            $table->enum('type', ['ВКЛ', 'НКЛ', 'БГ', 'ЛБГ', 'Разное']);
            $table->unsignedInteger('amount')->nullable();
            $table->boolean('pledge')->default(false);
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
