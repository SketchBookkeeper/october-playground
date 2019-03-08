<?php namespace PaulAllen\Profile\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function(Blueprint $table) {
                $table->text('bio')->nullable();
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function(Blueprint $table) {
                $table->dropColumn('bio');
            });
        }
    }
}
