<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // uses Schema facade to create/ modifty database tables and columns
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            // might need to migrate to make this unique
            $table->string('name');
            // This column will store the id of the user that the task belongs to.
            $table->bigInteger('user_id');
            //$table->string('slug')->unique();
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
        Schema::dropIfExists('tasks');
    }
}

