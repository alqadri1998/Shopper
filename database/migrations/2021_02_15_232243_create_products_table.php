<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('details');
            $table->string('product_image');
            $table->integer('count');
            $table->integer('price');
            $table->integer('sell_price');
            $table->enum('gender',['Male','Female']);
            $table->enum('size',['Small','Medium','Large','xl','xxl','xxxl']);
            $table->enum('type',['Kid','Teenger','Old']);
            $table->enum('season',['Summer','Fall','Winter','Spring']);
            $table->enum('status',['Visibile','Hidden']);
            
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');






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
        Schema::dropIfExists('products');
    }
}
