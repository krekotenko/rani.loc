<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTableFreeSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('free_session_applications', function (Blueprint $table) {
            //
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whats_app')->nullable();
            $table->string('wechat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('free_session_applications', function (Blueprint $table) {
            //
        });
    }
}
