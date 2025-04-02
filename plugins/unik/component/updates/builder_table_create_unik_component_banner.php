<?php namespace Unik\Component\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikComponentBanner extends Migration
{
    public function up()
    {
        Schema::create('unik_component_banner', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('name', 255);
            $table->text('description');
            $table->string('url', 255);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_component_banner');
    }
}
