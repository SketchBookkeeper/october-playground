<?php namespace PaulAllen\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePaulallenMoviesActorsMovies extends Migration
{
    public function up()
    {
        Schema::rename('paulallen_movies_actors_movies', 'paulallen_movies_actors_movies_');
    }
    
    public function down()
    {
        Schema::rename('paulallen_movies_actors_movies_', 'paulallen_movies_actors_movies');
    }
}
