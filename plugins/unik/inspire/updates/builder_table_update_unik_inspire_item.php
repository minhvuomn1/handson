<?php namespace Unik\Inspire\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikInspireItem extends Migration
{
    public function up()
    {
        Schema::table('unik_inspire_item', function($table)
        {
            $table->dropColumn('category');
        });
    }
    
    public function down()
    {
        Schema::table('unik_inspire_item', function($table)
        {
            $table->integer('category')->nullable();
        });
    }
}
