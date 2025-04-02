<?php namespace Unik\Component\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikComponentSosial extends Migration
{
    public function up()
    {
        Schema::create('unik_component_sosial', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_component_sosial');
    }
}
