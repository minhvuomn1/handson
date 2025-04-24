<?php namespace Unik\Scholarshipmanagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikScholarshipmanagementScholarshipStudent extends Migration
{
    public function up()
    {
        Schema::create('unik_scholarshipmanagement_scholarship_student', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->bigInteger('student_id')->nullable()->unsigned();
            $table->bigInteger('scholarship_id')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_scholarshipmanagement_scholarship_student');
    }
}
