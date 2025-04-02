<?php namespace Unik\Inspire\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikInspireItemTags extends Migration
{
    public function up()
    {
        Schema::table('unik_inspire_item_tags', function($table)
        {
            $table->dropPrimary(['item_id','tag_id']);
        });
    }
    
    public function down()
    {
        Schema::table('unik_inspire_item_tags', function($table)
        {
            $table->primary(['item_id','tag_id']);
        });
    }
}
