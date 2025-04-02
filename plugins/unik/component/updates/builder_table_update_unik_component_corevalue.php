<?php namespace Unik\Component\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikComponentCorevalue extends Migration
{
    public function up()
    {
        Schema::rename('unik_component_', 'unik_component_corevalue');
    }
    
    public function down()
    {
        Schema::rename('unik_component_corevalue', 'unik_component_');
    }
}
