<?php namespace Unik\Inspire\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikInspireItem4 extends Migration
{
    public function up()
    {
        Schema::table('unik_inspire_item', function($table)
        {
            $table->boolean('is_hot')->nullable()->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('unik_inspire_item', function($table)
        {
            $table->dropColumn('is_hot');
        });
    }
}
