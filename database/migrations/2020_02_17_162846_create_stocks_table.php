<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            // $table->mediumIncrements('id');
            $table->string('sku', 10);
            $table->decimal('quantity', 3,0)->default(0);
            $table->decimal('in_cart', 3,0)->default(0);

            $table->primary('sku');
            $table->foreign('sku')->references('sku')->on('products_variant')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
