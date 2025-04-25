<?php namespace Unik\Scholarshipmanagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikScholarshipmanagementScholarshipStudent extends Migration
{
    public function up()
    {
        Schema::table('unik_scholarshipmanagement_scholarship_student', function($table)
        {
            $table->string('result_activity', 500)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('unik_scholarshipmanagement_scholarship_student', function($table)
        {
            $table->dropColumn('result_activity');
        });
    }
}
