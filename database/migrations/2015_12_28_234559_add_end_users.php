<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEndUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address', 100)->nullable();
            $table->string('district', 80)->nullable();
            $table->string('number', 10)->nullable();
            $table->string('zip_code', 9)->nullable();
            $table->string('city', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('address');
            $table->removeColumn('district');
            $table->removeColumn('number');
            $table->removeColumn('zip_code');
            $table->removeColumn('city');
        });
    }
}
