<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('contact')->nullable();
            $table->string('country')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('examined_by_id')->nullable();
            $table->unsignedBigInteger('education_system_id')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('course_studied')->nullable();
            $table->date('tertiary_year_from')->nullable();
            $table->date('tertiary_year_to')->nullable();
            $table->text('index_exam_reg')->nullable();
            $table->string('name_on_certificate')->nullable();
            $table->string('primary_school')->nullable();
            $table->text('index_number')->nullable();
            $table->text('grade_score_primary')->nullable();
            $table->text('grade_score')->nullable();
            $table->text('index_number_secondary')->nullable();
            $table->text('secondary_school')->nullable();
            $table->date('secondary_year_from')->nullable();
            $table->date('secondary_year_to')->nullable();
            $table->date('primary_year_from')->nullable();
            $table->date('primary_year_to')->nullable();
            $table->text('grade_score_secondary')->nullable();
            $table->enum('gender',['Male','Female'])->nullable();
            $table->date('birth')->nullable();
            $table->text('nationality')->nullable();
            $table->text('identification')->nullable();
            $table->text('birth_certificate')->nullable();
            $table->enum('level',['Tertiary','Secondary','Primary'])->nullable();
            $table->enum('marital',['single','married','divorced','separated','Others'])->nullable();
            $table->enum('religion',['christian','muslim','buddhist','atheist','others'])->nullable();
            $table->text('employer_name')->nullable();
            $table->text('designation')->nullable();
            $table->text('assignment')->nullable();
            $table->date('work_year_from')->nullable();
            $table->date('work_year_to')->nullable();
            $table->text('postal_code')->nullable();
            $table->text('postal_address')->nullable();
            $table->text('town')->nullable();
            $table->text('alternative_contact')->nullable();
            $table->text('kin_alternative_contact')->nullable();
            $table->text('kin_names')->nullable();
            $table->enum('relationship',['Father','Mother','Spouse','Brother','Sister','Son','Daughter','Guardian','Other'])->nullable();
           $table->string('kin_country')->nullable();
           $table->text('kin_contact')->nullable();
           $table->text('kin_postal_code')->nullable();
            $table->text('kin_postal_address')->nullable();
            $table->text('kin_email')->nullable();
            $table->text('kin_town')->nullable();
            $table->text('kin_nationality')->nullable();
            $table->text('county')->nullable();
            $table->text('sub_county')->nullable();
            $table->text('location')->nullable();
            $table->text('sub_location')->nullable();
            $table->text('landmark')->nullable();

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
        Schema::dropIfExists('profiles');
    }
}
