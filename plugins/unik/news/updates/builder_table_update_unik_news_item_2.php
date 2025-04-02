<?php namespace Unik\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikNewsItem2 extends Migration
{
    public function up()
    {
        Schema::table('unik_news_item', function($table)
        {
            $table->boolean('is_hot')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('unik_news_item', function($table)
        {
            $table->dropColumn('is_hot');
        });
    }
}
