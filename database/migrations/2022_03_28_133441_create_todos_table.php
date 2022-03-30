<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->text('tasks');
            $table->boolean('status')->default(1); // Task is open or was closed
            $table->boolean('TaskStatus')->default(0); // Task pending or received. Default "0" is pending, "1" is recived
            $table->tinyInteger('priority')->default(0); // is this task ordinary or high priority.Default "0" is ordinary, "1" is high priority
            $table->tinyInteger('user_id'); // who will recive this task
            $table->text('TaskDetail')->nullable(); // task detail notes
            $table->dateTime('DeadLine')->nullable(); // termin date
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
        Schema::dropIfExists('todos');
    }
};
