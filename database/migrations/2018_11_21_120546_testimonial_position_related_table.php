<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TestimonialPositionRelatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonial_position_related', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('testimonial_id')->unsigned();
            $table->integer('page_id')->unsigned()->nullable();
            $table->integer('program_id')->unsigned()->nullable();
            $table->integer('position_id')->unsigned()->nullable();
            $table->integer('section_id')->unsigned()->nullable();
        });

        Schema::table('testimonial_position_related', function (Blueprint $table) {
            $table->foreign('testimonial_id')->references('id')->on('testimonials');
            $table->foreign('page_id')->references('id')->on('pages');
            $table->foreign('program_id')->references('id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
