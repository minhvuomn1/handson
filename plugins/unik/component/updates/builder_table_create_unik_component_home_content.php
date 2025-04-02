<?php namespace Unik\Component\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikComponentHomeContent extends Migration
{
    public function up()
    {
        Schema::create('unik_component_home_content', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('name', 500)->nullable();
            $table->string('title', 500)->nullable();
            $table->text('description')->nullable();
            $table->string('url_seemore', 255)->nullable();
            $table->string('name_button', 100)->nullable();
            $table->string('url_button', 255)->nullable();
            $table->boolean('has_button')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_component_home_content');
    }
}
