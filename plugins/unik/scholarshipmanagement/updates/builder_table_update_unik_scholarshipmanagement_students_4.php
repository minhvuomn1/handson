<?php namespace Unik\Scholarshipmanagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikScholarshipmanagementStudents4 extends Migration
{
    public function up()
    {
        Schema::table('unik_scholarshipmanagement_students', function($table)
        {
            $table->string('sex', 255)->nullable();
            $table->string('family_manner', 500)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('unik_scholarshipmanagement_students', function($table)
        {
            $table->dropColumn('sex');
            $table->dropColumn('family_manner');
        });
    }
}
