<?php

use Illuminate\Database\Migrations\Migration;
use App\AlphaFramework\Blueprint as AlphaBlueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
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

        $schema->create('company', function (AlphaBlueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
