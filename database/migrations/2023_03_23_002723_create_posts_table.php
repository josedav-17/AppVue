<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // agregamos el usuario que creo el post
            $table->bigInteger('user_id')->unsigned();
            $table->string('name',100)->nullable()->default('Text');
            $table->biginteger('category_id')->unsigned()->nullable();
            $table->text('description')->nullable();/*campo tipo text area */
            $table->enum('state',['post','no post'])->default('no post');/*Opciones de seleccion. */
            $table->timestamps();

            //Agregando clave foranea:
                $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
