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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('autor')->nullable(false);
            $table->string('titulo')->nullable(false);
            $table->string('extracto');
            $table->boolean('caducable')->default(false);
            $table->boolean('comentable')->default(false);
            $table->string('acceso')->default('publico');
            $table->longText('contenido')->nullable(false);

            $table->timestamps();

            // Foreign key from table users
            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
