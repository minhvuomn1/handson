<?php namespace Unik\Component\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikComponentThamgia extends Migration
{
    public function up()
    {
        Schema::create('unik_component_thamgia', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('sort_order')->nullable()->default(1);
            $table->string('title', 255)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('image', 500)->nullable();
            $table->text('content')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_component_thamgia');
    }
}
