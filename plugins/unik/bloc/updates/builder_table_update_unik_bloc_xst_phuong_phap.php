<?php namespace Unik\Bloc\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateUnikBlocXstPhuongPhap extends Migration
{
    public function up()
    {
        Schema::table('unik_bloc_xst_phuong_phap', function($table)
        {
            $table->string('image', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('unik_bloc_xst_phuong_phap', function($table)
        {
            $table->string('image', 255)->nullable(false)->change();
        });
    }
}
