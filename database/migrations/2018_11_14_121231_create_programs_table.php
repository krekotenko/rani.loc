<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->text("title")->nullable();
            $table->text("titleH1")->nullable();
            $table->text("description")->nullable();
            $table->text("alias")->nullable();
            $table->text("text")->nullable();
            $table->text("background_image")->nullable();
            $table->text("icon_block_title")->nullable();
            $table->text("icon_1")->nullable();
            $table->text("icon_text_1")->nullable();
            $table->text("icon_2")->nullable();
            $table->text("icon_text_2")->nullable();
            $table->text("icon_3")->nullable();
            $table->text("icon_text_3")->nullable();
            $table->text("icon_4")->nullable();
            $table->text("icon_text_4")->nullable();
            $table->text("icon_5")->nullable();
            $table->text("icon_text_5")->nullable();
            $table->text("icon_6")->nullable();
            $table->text("icon_text_6")->nullable();
            $table->text("who_title_1")->nullable();
            $table->text("who_text_1")->nullable();
            $table->text("who_title_2")->nullable();
            $table->text("who_text_2")->nullable();
            $table->text("who_title_3")->nullable();
            $table->text("who_text_3")->nullable();
            $table->text("who_title_4")->nullable();
            $table->text("who_text_4")->nullable();
            $table->text("who_title_5")->nullable();
            $table->text("who_text_5")->nullable();
            $table->text("when_title_1")->nullable();
            $table->text("when_text_1")->nullable();
            $table->text("when_title_2")->nullable();
            $table->text("when_text_2")->nullable();
            $table->text("when_title_3")->nullable();
            $table->text("when_text_3")->nullable();
            $table->text("sets_title_1")->nullable();
            $table->text("sets_text_1")->nullable();
            $table->text("sets_title_2")->nullable();
            $table->text("sets_text_2")->nullable();
            $table->text("sets_title_3")->nullable();
            $table->text("sets_text_3")->nullable();
            $table->text("sets_title_4")->nullable();
            $table->text("sets_text_4")->nullable();
            $table->text("button_text")->nullable();
            $table->text("button_inner_text")->nullable();
            $table->text("button_link")->nullable();
            $table->text("url_page_1")->nullable();
            $table->text("link_image_1")->nullable();
            $table->text("path_image_1")->nullable();
            $table->text("url_page_2")->nullable();
            $table->text("link_image_2")->nullable();
            $table->text("path_image_2")->nullable();
            $table->text("url_page_3")->nullable();
            $table->text("link_image_3")->nullable();
            $table->text("path_image_3")->nullable();

            $table->enum("show_calculator",["0","1"])->default(0);
            $table->enum("show_message",["0","1"])->default(0);
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
        Schema::dropIfExists('programs');
    }
}
