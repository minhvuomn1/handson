<?php namespace Unik\Scholarshipmanagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikScholarshipmanagementStudents3 extends Migration
{
    public function up()
    {
        Schema::table('unik_scholarshipmanagement_students', function($table)
        {
            $table->bigInteger('school_id')->nullable()->unsigned();
            $table->integer('grade')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('unik_scholarshipmanagement_students', function($table)
        {
            $table->dropColumn('school_id');
            $table->text('grade')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
