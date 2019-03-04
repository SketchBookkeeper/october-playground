<?php namespace PaulAllen\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePaulallenMovies4 extends Migration
{
    public function up()
    {
        Schema::table('paulallen_movies_', function($table)
        {
            $table->text('actors')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('paulallen_movies_', function($table)
        {
            $table->dropColumn('actors');
        });
    }
}
