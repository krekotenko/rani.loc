<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFreeSessionTableDates extends Migration
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
            $table->dropColumn('date_of_last_check');
        });

        Schema::table('free_session_applications', function (Blueprint $table) {
            //
            $table->timestamp('dob')->nullable();
            $table->timestamp('date_of_last_check')->nullable();
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
