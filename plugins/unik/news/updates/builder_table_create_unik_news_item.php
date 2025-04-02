<?php namespace Unik\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikNewsItem extends Migration
{
    public function up()
    {
        Schema::create('unik_news_item', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('name', 500)->nullable();
            $table->integer('sort_order')->nullable();
            $table->string('image', 500)->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->integer('category_id')->nullable();
            $table->boolean('mis_visible')->nullable()->default(1);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_news_item');
    }
}
