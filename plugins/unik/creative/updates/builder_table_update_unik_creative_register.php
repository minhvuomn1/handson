<?php namespace Unik\Creative\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikCreativeRegister extends Migration
{
    public function up()
    {
        Schema::table('unik_creative_register', function($table)
        {
            $table->string('phone', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('unik_creative_register', function($table)
        {
            $table->dropColumn('phone');
        });
    }
}
