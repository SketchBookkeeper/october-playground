<?php namespace PaulAllen\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePaulallenMoviesActors2 extends Migration
{
    public function up()
    {
        Schema::table('paulallen_movies_actors_', function($table)
        {
            $table->string('lastname', 10)->default('NULL')->change();
        });
    }
    
    public function down()
    {
        Schema::table('paulallen_movies_actors_', function($table)
        {
            $table->string('lastname', 10)->default('\'NULL\'')->change();
        });
    }
}
