<?php

use Illuminate\Database\Migrations\Migration;
use App\AlphaFramework\Blueprint as AlphaBlueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
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

        $schema->create('user', function (AlphaBlueprint $table) {
            $table->BaseEntity();
            $table->text('name');
            $table->string('user_name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->rememberToken();
            $table->bigInteger("user_role_id")->unsigned();
            $table->foreign("user_role_id")->references("id")->on("user_role")->onDelete("restrict");
            $table->text("api_token")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
