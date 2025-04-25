<?php namespace Unik\Scholarshipmanagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikScholarshipmanagementScholarships2 extends Migration
{
    public function up()
    {
        Schema::table('unik_scholarshipmanagement_scholarships', function($table)
        {
            $table->renameColumn('sponsor_id', 'sponsors_id');
        });
    }
    
    public function down()
    {
        Schema::table('unik_scholarshipmanagement_scholarships', function($table)
        {
            $table->renameColumn('sponsors_id', 'sponsor_id');
        });
    }
}
