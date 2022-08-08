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
        Schema::create('generators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->nullable();
            $table->string('title');
            $table->text('description');
            $table->integer('rating')->nullable()->default(0);
            $table->integer('flag')->default(1);
            $table->timestamps();
        });

        Schema::create('generator_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('generator_id')->index();
            $table->integer('order')->nullable()->default(null);
        });

        Schema::create('generator_step_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('generator_step_id')->index();
            $table->string('title');
            $table->integer('order')->nullable()->default(null);
        });

        Schema::create('saved', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('title');
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
        Schema::dropIfExists('generators');
        Schema::dropIfExists('generator_steps');
        Schema::dropIfExists('generator_step_items');
    }
};
