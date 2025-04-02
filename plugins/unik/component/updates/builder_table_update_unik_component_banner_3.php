<?php namespace Unik\Component\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikComponentBanner3 extends Migration
{
    public function up()
    {
        Schema::table('unik_component_banner', function($table)
        {
            $table->integer('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('unik_component_banner', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
