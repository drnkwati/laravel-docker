<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate
     *
     * @return void
     */
    public function up()
    {
        $target = 'tasks';

        Schema::hasTable($target) ?: Schema::create($target, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100);
            $table->text('description')->nullable();
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
