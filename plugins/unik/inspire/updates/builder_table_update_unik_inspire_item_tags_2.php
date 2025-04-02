<?php namespace Unik\Inspire\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikInspireItemTags2 extends Migration
{
    public function up()
    {
        Schema::table('unik_inspire_item_tags', function($table)
        {
            $table->increments('id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('unik_inspire_item_tags', function($table)
        {
            $table->dropColumn('id');
        });
    }
}
