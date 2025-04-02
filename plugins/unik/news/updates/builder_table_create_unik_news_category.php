<?php namespace Unik\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikNewsCategory extends Migration
{
    public function up()
    {
        Schema::create('unik_news_category', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('sort_order')->nullable();
            $table->string('name', 500)->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_news_category');
    }
}
