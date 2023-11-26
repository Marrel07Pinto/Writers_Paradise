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
        Schema::create('writer_book',function(Blueprint $table){
            $table->primary(['writer_id','book_id']);
            $table->unsignedBigInteger('writer_id')->unsigned();
            $table->unsignedBigInteger('book_id')->unsigned();
            $table->timestamps();

            $table->foreign('writer_id')->references('writer_id')->on('writers')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('book_id')->references('book_id')->on('books')
            ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
