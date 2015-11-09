<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 5)->index();
            $table->timestamps();
        });

        Schema::create('country_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->string('name');
            $table->string('locale', 5)->index();

            $table->unique(['country_id', 'locale']);
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')
                ->references('id')
                ->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_country_id_foreign');
            $table->dropColumn('country_id');
        });

        Schema::drop('country_translations');
        Schema::drop('countries');
    }
}
