<?php namespace Unik\Scholarshipmanagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikScholarshipmanagementStudents2 extends Migration
{
    public function up()
    {
        Schema::table('unik_scholarshipmanagement_students', function($table)
        {
            $table->dropColumn('school_id');
        });
    }
    
    public function down()
    {
        Schema::table('unik_scholarshipmanagement_students', function($table)
        {
            $table->integer('school_id')->nullable()->unsigned();
        });
    }
}
