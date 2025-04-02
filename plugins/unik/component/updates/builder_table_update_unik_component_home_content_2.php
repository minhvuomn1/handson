<?php namespace Unik\Component\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikComponentHomeContent2 extends Migration
{
    public function up()
    {
        Schema::table('unik_component_home_content', function($table)
        {
            $table->integer('order')->nullable()->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('unik_component_home_content', function($table)
        {
            $table->dropColumn('order');
        });
    }
}
