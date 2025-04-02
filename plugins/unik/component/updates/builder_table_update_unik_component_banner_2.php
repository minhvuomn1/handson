<?php namespace Unik\Component\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikComponentBanner2 extends Migration
{
    public function up()
    {
        Schema::table('unik_component_banner', function($table)
        {
            $table->string('name', 255)->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('url', 255)->nullable()->change();
            $table->string('image', 500)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('unik_component_banner', function($table)
        {
            $table->string('name', 255)->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
            $table->string('url', 255)->nullable(false)->change();
            $table->string('image', 500)->nullable(false)->change();
        });
    }
}
