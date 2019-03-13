<?php namespace PaulAllen\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePaulallenMovies8 extends Migration
{
    public function up()
    {
        Schema::table('paulallen_movies_', function($table)
        {
            $table->boolean('published')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('paulallen_movies_', function($table)
        {
            $table->boolean('published')->default(NULL)->change();
        });
    }
}
