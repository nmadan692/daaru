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
            $table->id();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('name')->nullable();
            $table->string('volume')->nullable();
            $table->string('country')->nullable();
            $table->float('alcohol')->nullable();
            $table->string('description', 1000)->nullable();
            $table->float('price')->nullable();
            $table->float('discount')->nullable();
            $table->boolean('is_percent')->default(false);
            $table->float('quantity')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

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
