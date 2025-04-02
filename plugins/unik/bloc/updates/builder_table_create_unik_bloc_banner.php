<?php namespace Unik\Bloc\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikBlocBanner extends Migration
{
    public function up()
    {
        Schema::create('unik_bloc_banner', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('sort_order')->nullable()->default(1);
            $table->string('name', 255)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('url', 255)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_bloc_banner');
    }
}
