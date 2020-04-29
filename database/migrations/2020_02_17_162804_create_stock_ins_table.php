<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks_in', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('sku', 10);
            $table->decimal('qtde', 3,0);
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('sku')->references('sku')->on('products_variant')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stocks_in');
    }
}
