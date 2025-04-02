<?php namespace Unik\News\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikNewsItem extends Migration
{
    public function up()
    {
        Schema::table('unik_news_item', function($table)
        {
            $table->renameColumn('mis_visible', 'is_visible');
        });
    }
    
    public function down()
    {
        Schema::table('unik_news_item', function($table)
        {
            $table->renameColumn('is_visible', 'mis_visible');
        });
    }
}
