<?php namespace PaulAllen\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePaulallenMovies9 extends Migration
{
    public function up()
    {
        Schema::table('paulallen_movies_', function($table)
        {
            $table->boolean('published')->default(0)->change();
            $table->dropColumn('created_at');
        });
    }
    
    public function down()
    {
        Schema::table('paulallen_movies_', function($table)
        {
            $table->boolean('published')->default(NULL)->change();
            $table->time('created_at')->nullable()->default('NULL');
        });
    }
}
