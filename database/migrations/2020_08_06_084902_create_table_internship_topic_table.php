<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInternshipTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_topic', function (Blueprint $table) {
            $table->integer('internship_id')->unsigned();
         //   $table->foreign('internship_id')->references('internship_id')->on('internships');
            $table->integer('topic_id')->unsigned();
          //  $table->foreign('topic_id')->references('id')->on('topics');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('purpose')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internship_topic');
    }
}
