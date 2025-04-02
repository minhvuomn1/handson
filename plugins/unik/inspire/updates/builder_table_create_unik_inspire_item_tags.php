<?php namespace Unik\Inspire\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikInspireItemTags extends Migration
{
    public function up()
    {
        Schema::create('unik_inspire_item_tags', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('item_id');
            $table->integer('tag_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->primary(['item_id','tag_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_inspire_item_tags');
    }
}
