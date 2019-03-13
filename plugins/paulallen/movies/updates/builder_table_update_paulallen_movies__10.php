<?php namespace PaulAllen\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePaulallenMovies10 extends Migration
{
    public function up()
    {
        Schema::table('paulallen_movies_', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->boolean('published')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('paulallen_movies_', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->boolean('published')->default(NULL)->change();
        });
    }
}
