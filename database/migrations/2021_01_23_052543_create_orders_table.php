<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shoppingcart_id');
            $table->string('recipient_name')->nullable();
            $table->string('email', 70)->nullable();            
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            $table->double('sub_total', 8, 2)->nullable();            
            $table->text('details')->nullable();            
            $table->timestamps();

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
        Schema::dropIfExists('orders');
    }
}
