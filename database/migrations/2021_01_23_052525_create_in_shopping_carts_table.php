<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_shopping_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('shoppingcart_id');
            $table->integer('count')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('shoppingcart_id')->references('id')->on('shopping_carts')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('in_shopping_carts');
    }
}
