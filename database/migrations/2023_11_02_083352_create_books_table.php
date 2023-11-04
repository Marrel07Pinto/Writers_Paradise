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
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
            $table->biginteger('order_id')->unsigned();
            $table->string('b_name');
            $table->string('b_description');
            $table->string('b_genre');
            $table->Integer('b_price');
            $table->Integer('b_no_of_copies');
            $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('orders')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
