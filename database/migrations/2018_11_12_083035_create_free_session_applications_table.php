<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreeSessionApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_session_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string("city")->nullable();
            $table->string("way-contact")->nullable();
            $table->string("firstname")->nullable();
            $table->string("surname")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("occupation")->nullable();
            $table->string("material_status")->nullable();
            $table->string("mental_conditions")->nullable();
            $table->string("doctor_name")->nullable();
            $table->string("date_of_last_check")->nullable();
            $table->string("past_medications")->nullable();
            $table->enum("addictions",["0","1"])->default(0);
            $table->string("addictions_ta")->nullable();
            $table->enum("achieving_goals",["0","1"])->default(0);
            $table->enum("anorexia",["0","1"])->default(0);
            $table->enum("anxiety",["0","1"])->default(0);
            $table->enum("bulimia",["0","1"])->default(0);
            $table->enum("career",["0","1"])->default(0);
            $table->enum("childhood_problems",["0","1"])->default(0);
            $table->enum("concentration",["0","1"])->default(0);
            $table->enum("confidence",["0","1"])->default(0);
            $table->enum("compulsive_behavior",["0","1"])->default(0);
            $table->enum("depression",["0","1"])->default(0);
            $table->enum("exams",["0","1"])->default(0);
            $table->enum("eating_problems",["0","1"])->default(0);
            $table->enum("fears",["0","1"])->default(0);
            $table->enum("fertility",["0","1"])->default(0);
            $table->enum("guilt",["0","1"])->default(0);
            $table->enum("mental_health_issues",["0","1"])->default(0);
            $table->enum("motivation",["0","1"])->default(0);
            $table->enum("memory",["0","1"])->default(0);
            $table->enum("nerves",["0","1"])->default(0);
            $table->enum("pain_control",["0","1"])->default(0);
            $table->enum("panic_attacks",["0","1"])->default(0);
            $table->enum("phobias",["0","1"])->default(0);
            $table->enum("public_speaking",["0","1"])->default(0);
            $table->enum("relationships",["0","1"])->default(0);
            $table->enum("relaxation",["0","1"])->default(0);
            $table->enum("stress",["0","1"])->default(0);
            $table->enum("self_esteem",["0","1"])->default(0);
            $table->enum("sleep_problems",["0","1"])->default(0);
            $table->enum("sexual_problems",["0","1"])->default(0);
            $table->enum("other_issues",["0","1"])->default(0);
            $table->string("other_issues_ta")->nullable();
            $table->text("most_important_issue")->nullable();
            $table->text("if_you_no_longer")->nullable();
            $table->text("greatest_desire")->nullable();
            $table->text("signature")->nullable();

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
        Schema::dropIfExists('free_session_applications');
    }
}
