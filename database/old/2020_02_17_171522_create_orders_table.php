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
            $table->unsignedMediumInteger('user_id')->nullable();
            $table->unsignedSmallInteger('address_id');
            $table->date('order_date');
            $table->date('delivery_date')->nullable();
            $table->string('payment', 25)->nullable();
            $table->decimal('shipping', 7,0)->nullable();
            $table->ipAddress('ip_address');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->enum('status', ['A','F','C','P'])->comment('
                A = Aberto,
                F = Fechado,
                C = Cancelado,
                P = Pendente
            ')->default('A');

            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade'); //->onDelete('restrict');
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
