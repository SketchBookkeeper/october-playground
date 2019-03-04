<?php namespace PaulAllen\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePaulallenMovies3 extends Migration
{
    public function up()
    {
        Schema::table('paulallen_movies_', function($table)
        {
            $table->integer('year')->default(1000)->change();
        });
    }
    
    public function down()
    {
        Schema::table('paulallen_movies_', function($table)
        {
            $table->integer('year')->default(NULL)->change();
        });
    }
}
