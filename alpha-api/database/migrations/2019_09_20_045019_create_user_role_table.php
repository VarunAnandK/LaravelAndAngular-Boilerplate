<?php

use Illuminate\Database\Migrations\Migration;
use App\AlphaFramework\Blueprint as AlphaBlueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $schema = \DB::connection()->getSchemaBuilder();
        $schema->blueprintResolver(function($table, $callback) {
            return new AlphaBlueprint($table, $callback);
        });

        $schema->create('user_role', function (AlphaBlueprint $table) {
            $table->BaseEntity();
            $table->string("name",200)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_role');
    }
}
