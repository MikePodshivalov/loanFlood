<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('loan_id');
            $table->unsignedBigInteger('tag_id');
            $table->primary(['loan_id', 'tag_id']);
            $table
                ->foreign('loan_id')
                ->references('id')
                ->on('loans')
                ->onDelete('cascade');
            $table
                ->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_tag');
    }
}
