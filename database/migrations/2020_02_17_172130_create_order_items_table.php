<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_item', function (Blueprint $table) {
            $table->string('sku', 10);
            $table->unsignedMediumInteger('order_id');
            $table->unsignedSmallInteger('item');
            $table->decimal('quantity', 2,0);
            $table->decimal('price_orig', 7,2);
            $table->decimal('price_sale', 7,2);
            $table->decimal('subtotal', 7,2);
            $table->decimal('discount', 7,2)->default(0);
            $table->decimal('taxes', 7,2)->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->primary(['sku', 'order_id']);
            $table->foreign('order_id')->references('order_id')->on('orders')->onUpdate('cascade');
            $table->foreign('sku')->references('sku')->on('products_variant')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_item');
    }
}
