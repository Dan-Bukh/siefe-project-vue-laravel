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
        Schema::create('catalog', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('title');
            $table->string('price');
            $table->string('count');
            $table->text('content');
            $table->string('image');
            $table->timestamps();
            // ['category', "title", 'price', 'count', 'content', 'image'];
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog');
    }
};
