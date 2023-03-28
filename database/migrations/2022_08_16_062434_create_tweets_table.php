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
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('teacher');
            $table->string('hyouka');
            $table->string('date');
            $table->string('format');
            $table->string('gakubu');
            $table->string('campus');
            $table->text('clas');
            $table->text('test');
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
        Schema::dropIfExists('tweets');
    }
};
