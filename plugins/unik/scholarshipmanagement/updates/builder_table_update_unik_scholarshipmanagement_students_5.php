<?php namespace Unik\Scholarshipmanagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikScholarshipmanagementStudents5 extends Migration
{
    public function up()
    {
        Schema::table('unik_scholarshipmanagement_students', function($table)
        {
            $table->text('sex')->nullable()->unsigned(false)->default(null)->change();
            $table->text('family_manner')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('unik_scholarshipmanagement_students', function($table)
        {
            $table->string('sex', 255)->nullable()->unsigned(false)->default(null)->change();
            $table->string('family_manner', 500)->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
