<?php namespace Unik\Component\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikComponentBanner extends Migration
{
    public function up()
    {
        Schema::table('unik_component_banner', function($table)
        {
            $table->string('image', 500);
        });
    }
    
    public function down()
    {
        Schema::table('unik_component_banner', function($table)
        {
            $table->dropColumn('image');
        });
    }
}
