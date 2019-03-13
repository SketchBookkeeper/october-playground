<?php namespace PaulAllen\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePaulallenMovies7 extends Migration
{
    public function up()
    {
        Schema::table('paulallen_movies_', function($table)
        {
            $table->string('name', 191)->nullable()->change();
            $table->time('created_at')->nullable()->unsigned(false)->default(null)->change();
            $table->boolean('published')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('paulallen_movies_', function($table)
        {
            $table->string('name', 191)->nullable(false)->change();
            $table->timestamp('created_at')->nullable()->unsigned(false)->default('NULL')->change();
            $table->boolean('published')->default(NULL)->change();
        });
    }
}
