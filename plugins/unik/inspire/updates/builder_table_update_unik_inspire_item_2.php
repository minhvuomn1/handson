<?php namespace Unik\Inspire\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikInspireItem2 extends Migration
{
    public function up()
    {
        Schema::table('unik_inspire_item', function($table)
        {
            $table->integer('category_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('unik_inspire_item', function($table)
        {
            $table->dropColumn('category_id');
        });
    }
}
