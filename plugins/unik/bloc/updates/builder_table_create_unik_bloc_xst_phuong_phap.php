<?php namespace Unik\Bloc\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikBlocXstPhuongPhap extends Migration
{
    public function up()
    {
        Schema::create('unik_bloc_xst_phuong_phap', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('sort_order')->nullable()->default(1);
            $table->string('name', 300)->nullable();
            $table->text('content')->nullable();
            $table->string('image');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_bloc_xst_phuong_phap');
    }
}
