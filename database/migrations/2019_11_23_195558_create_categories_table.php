<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('author_id')->unsigned()->nullable();
            $table->bigInteger('editor_id')->unsigned()->nullable();
            $table->string('name', 255)->unique();
            $table->string('slug', 255)->unique();
            $table->smallInteger('sort_order')->default(9);
            $table->string('description', 1000)->nullable();
            $table->boolean('commentable')->default(true);
            $table->boolean('rssable')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users')
                ->onUpdate('set null')->onDelete('set null');
            $table->foreign('editor_id')->references('id')->on('users')
                ->onUpdate('set null')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
