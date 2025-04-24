<?php namespace Unik\Scholarshipmanagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikScholarshipmanagementStudents extends Migration
{
    public function up()
    {
        Schema::table('unik_scholarshipmanagement_students', function($table)
        {
            $table->date('dob')->nullable();
            $table->text('grade')->nullable();
            $table->string('location', 255)->nullable();
            $table->string('generation', 255)->nullable();
            $table->integer('school_id')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('unik_scholarshipmanagement_students', function($table)
        {
            $table->dropColumn('dob');
            $table->dropColumn('grade');
            $table->dropColumn('location');
            $table->dropColumn('generation');
            $table->dropColumn('school_id');
        });
    }
}
