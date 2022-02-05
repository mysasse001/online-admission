<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained();
            $table->unsignedBigInteger('identification_document_id')->constrained()->nullable();
            $table->unsignedBigInteger('disability_condition_id')->constrained()->nullable();
            $table->enum('gender',['male','female','other'])->nullable();
            $table->enum('marital',['single','married','divorced','separated','others'])->nullable();
            $table->enum('religion',['christian','muslim','buddhist','atheist','others'])->nullable();
             $table->integer('day')->nullable();
             $table->string('month')->nullable();
             $table->integer('year')->nullable();
             $table->string('nationality')->nullable();
             $table->string('identification_document_no')->nullable();
             $table->string('avatar')->nullable();
             $table->text('medical')->nullable();
             $table->text('activities')->nullable();
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
        Schema::dropIfExists('personal_information');
    }
}
