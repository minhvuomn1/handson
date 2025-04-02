<?php namespace Unik\Component\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikComponentThamgia extends Migration
{
    public function up()
    {
        Schema::table('unik_component_thamgia', function($table)
        {
            $table->string('url_button', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('unik_component_thamgia', function($table)
        {
            $table->dropColumn('url_button');
        });
    }
}
