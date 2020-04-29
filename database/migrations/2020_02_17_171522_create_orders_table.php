<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->mediumIncrements('order_id');
            $table->unsignedMediumInteger('user_id');
            $table->unsignedSmallInteger('address_id');
            $table->unsignedSmallInteger('invoice_id')->nullable();
            $table->char('order_ref', 9)->nullable();
            $table->date('order_date');
            $table->date('delivery_date')->nullable();
            $table->unsignedMediumInteger('payment_id')->nullable();
            $table->decimal('value', 7,2)->default(0);
            $table->decimal('shipping', 7,2)->default(0);
            $table->decimal('discount', 7,2)->default(0);
            $table->decimal('taxes', 7,2)->default(0);
            $table->string('ip_address', 45)->nullable();
            $table->string('comments', 200)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->enum('status', ['A','P','F','C'])->default('A');

            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade');
            $table->foreign('payment_id')->references('payment_id')->on('payments')->onUpdate('cascade');
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
