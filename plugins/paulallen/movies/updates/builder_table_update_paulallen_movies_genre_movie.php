<?php namespace PaulAllen\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePaulallenMoviesGenreMovie extends Migration
{
    public function up()
    {
        Schema::rename('paulallen_movies_movies_genres_', 'paulallen_movies_genre_movie');
    }
    
    public function down()
    {
        Schema::rename('paulallen_movies_genre_movie', 'paulallen_movies_movies_genres_');
    }
}
