<?php namespace Unik\Scholarshipmanagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikScholarshipmanagementScholarshipStudent3 extends Migration
{
    public function up()
    {
        Schema::table('unik_scholarshipmanagement_scholarship_student', function($table)
        {
            $table->dropColumn('scholar_images');
        });
    }
    
    public function down()
    {
        Schema::table('unik_scholarshipmanagement_scholarship_student', function($table)
        {
            $table->string('scholar_images', 500)->nullable();
        });
    }
}
