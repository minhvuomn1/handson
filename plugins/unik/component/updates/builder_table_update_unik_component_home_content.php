<?php namespace Unik\Component\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikComponentHomeContent extends Migration
{
    public function up()
    {
        Schema::table('unik_component_home_content', function($table)
        {
            $table->string('image', 500)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('unik_component_home_content', function($table)
        {
            $table->dropColumn('image');
        });
    }
}
