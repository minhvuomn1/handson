<?php namespace Unik\Scholarshipmanagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikScholarshipmanagementScholarships extends Migration
{
    public function up()
    {
        Schema::create('unik_scholarshipmanagement_scholarships', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255)->nullable();
            $table->string('type', 255);
            $table->bigInteger('sponsor_id')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_scholarshipmanagement_scholarships');
    }
}
