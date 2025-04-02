<?php namespace Unik\Component\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikComponentHomeContent3 extends Migration
{
    public function up()
    {
        Schema::table('unik_component_home_content', function($table)
        {
            $table->renameColumn('order', 'sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('unik_component_home_content', function($table)
        {
            $table->renameColumn('sort_order', 'order');
        });
    }
}
