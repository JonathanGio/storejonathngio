<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('user_id');
            $table->string('sku')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->text('details')->nullable();
            $table->text('more_info')->nullable();
            $table->string('avatar')->nullable();
            $table->string('available')->nullable();
            $table->integer('stock_available');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('cascade');

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
