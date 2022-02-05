<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('surname')->nullable();
            $table->string('mname')->nullable();
            $table->string('name');
            $table->string('country_code')->nullable();
            $table->string('telephone')->nullable();
            $table->text('nationality')->nullable();
            $table->text('postal_address')->nullable();
            $table->text('postal_code')->nullable();
            $table->text('town')->nullable();
            $table->boolean('admin')->default(false);
            $table->unsignedBigInteger('role_id')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
