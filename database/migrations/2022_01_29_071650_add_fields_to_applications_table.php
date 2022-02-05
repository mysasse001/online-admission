<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
             $table->unsignedBigInteger('user_id')->constrained();
             $table->unsignedBigInteger('location_id')->constrained();
             $table->unsignedBigInteger('programme_id')->constrained();
             $table->unsignedBigInteger('application_status_id')->constrained();
             $table->enum('fees_cleared',['yes','no'])->default('no');
             $table->string('fees_statement')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            //
        });
    }
}
