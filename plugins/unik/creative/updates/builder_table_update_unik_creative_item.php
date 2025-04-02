<?php namespace Unik\Creative\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikCreativeItem extends Migration
{
    public function up()
    {
        Schema::table('unik_creative_item', function($table)
        {
            $table->string('image', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('unik_creative_item', function($table)
        {
            $table->dropColumn('image');
        });
    }
}
