<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->boolean('is_finished');
            $table->timestamps();
        });
    }
    public function down()
    {
    }
}
