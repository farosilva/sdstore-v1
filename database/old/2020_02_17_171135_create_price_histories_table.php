<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices_history', function (Blueprint $table) {
            $table->smallIncrements('history_id');
            $table->unsignedSmallInteger('sku');
            $table->unsignedSmallInteger('table_id');
            $table->decimal('new_price', 7,2);
            $table->decimal('old_price', 7,2);
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('sku')->references('sku')->on('products_variant')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('table_id')->references('table_id')->on('prices_table')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices_history');
    }
}
