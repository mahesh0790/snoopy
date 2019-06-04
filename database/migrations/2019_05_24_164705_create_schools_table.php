<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_name');
            $table->string('area');
            $table->string('city');
            $table->string('pincode');
            $table->json('boards');
            $table->string('mobile_number')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('website')->unique()->nullable();
            $table->integer('max_students_per_class')->nullable();
            $table->json('mediums');
            $table->json('facilities');
            $table->json('school_types');
            $table->date('admission_start_date')->nullable();
            $table->date('admission_end_date')->nullable();
            $table->string('extra_activities')->nullable();
            $table->string('school_image');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('admins');
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
        Schema::dropIfExists('schools');
    }
}
