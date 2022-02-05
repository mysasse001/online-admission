<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained();
            $table->unsignedBigInteger('examined_by_id')->constrained();
            $table->unsignedBigInteger('education_system_id')->constrained();
            $table->string('institution')->nullable();
            $table->string('course')->nullable();
            $table->integer('from')->nullable();
            $table->integer('to')->nullable();
            $table->string('index_no')->nullable();
            $table->string('grade_score')->nullable();
            $table->string('certificate')->nullable();
            $table->string('name_on_certificate')->nullable();
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
        Schema::dropIfExists('education_backgrounds');
    }
}
