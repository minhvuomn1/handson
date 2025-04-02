<?php namespace Unik\Inspire\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikInspireItem3 extends Migration
{
    public function up()
    {
        Schema::table('unik_inspire_item', function($table)
        {
            $table->boolean('is_visible')->nullable()->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('unik_inspire_item', function($table)
        {
            $table->dropColumn('is_visible');
        });
    }
}
