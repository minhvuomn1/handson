<?php namespace Unik\Creative\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateUnikCreativeRegister extends Migration
{
    public function up()
    {
        Schema::create('unik_creative_register', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('name', 255)->nullable();
            $table->date('dob')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('cch', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unik_creative_register');
    }
}
