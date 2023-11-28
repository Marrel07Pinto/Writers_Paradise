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
        Schema::create('book_writer',function(Blueprint $table){
            $table->primary(['book_id','writer_id']);
            $table->unsignedBigInteger('book_id')->unsigned();
            $table->unsignedBigInteger('writer_id')->unsigned();
            
            $table->timestamps();
            
            $table->foreign('book_id')->references('id')->on('books')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('writer_id')->references('id')->on('writers')
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
