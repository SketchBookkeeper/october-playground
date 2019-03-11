<?php namespace PaulAllen\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePaulallenMoviesActors extends Migration
{
    public function up()
    {
        Schema::create('paulallen_movies_actors_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paulallen_movies_actors_');
    }
}
