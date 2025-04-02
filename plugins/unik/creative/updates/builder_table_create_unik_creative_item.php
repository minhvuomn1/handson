<?php namespace Unik\Creative\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikCreativeItem extends Migration
{
    public function up()
    {
        Schema::create('unik_creative_item', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('most_searched')->nullable()->default(0);
            $table->string('name', 500)->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->integer('rating')->default(0);
            $table->boolean('is_hot')->nullable()->default(0);
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_creative_item');
    }
}
