<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('persons', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('person');
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('category');
        });
        Schema::create('assigned_teams', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('team');
        });
        Schema::create('types', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('type');
        });


        Schema::create('jobs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('person_id')->index();
            $table->string('category_id')->index();
            $table->string('assigned_team_id')->index();
            $table->string('type_id')->index();
            $table->string('user_id')->index();
            $table->string('time_id')->index();

            $table->text('job');

            $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('assigned_team_id')->references('id')->on('assigned_teams')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });

        Schema::create('times', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->index();
            $table->string('job_id')->index();
            $table->dateTime('started_at');
            $table->dateTime('stopped_at');


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
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
