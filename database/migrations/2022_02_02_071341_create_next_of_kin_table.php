<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextOfKinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_of_kin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->constrained();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('relationship_id')->nullable();
            $table->unsignedBigInteger('identification_document_id')->nullable();
            $table->string('identification_document_no')->nullable();
            $table->unsignedBigInteger('title_id')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('town')->nullable();
            $table->string('nationality')->nullable();
            $table->enum('gender',['male','female','other'])->nullable();
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
        Schema::dropIfExists('next_of_kin');
    }
}
