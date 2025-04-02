<?php namespace Unik\Inspire\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikInspireItem extends Migration
{
    public function up()
    {
        Schema::create('unik_inspire_item', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('sort_order')->nullable();
            $table->string('image', 500)->nullable();
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->integer('category')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_inspire_item');
    }
}
