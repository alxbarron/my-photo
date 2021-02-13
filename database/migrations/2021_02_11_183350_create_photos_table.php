<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('album_id');
            $table->unsignedInteger('placeholder_id');
            $table->string('title', 100);
            $table->text('url');
            $table->text('thumbnail');
            $table->boolean('favorite')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index(['album_id', 'placeholder_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
