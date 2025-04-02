<?php namespace Unik\Inspire\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikInspireTags extends Migration
{
    public function up()
    {
        Schema::create('unik_inspire_tags', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('name', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_inspire_tags');
    }
}
