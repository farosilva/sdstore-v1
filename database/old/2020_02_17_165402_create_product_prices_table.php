<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_price', function (Blueprint $table) {
            $table->unsignedSmallInteger('sku');
            $table->unsignedSmallInteger('table_id');
            $table->date('start_date');
            $table->decimal('price', 8,2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->enum('status', ['A','I'])->default('A');

            $table->primary(['sku','table_id','start_date']);
            $table->foreign('sku')->references('sku')->on('products_variant')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('table_id')->references('table_id')->on('prices_table')->onUpdate('cascade')->onDelete('cascade');
        });

        // // Trigger - Quando Atualizar os Preços
        // DB::unprepared("
        //     CREATE TRIGGER trigger_prices_history_update AFTER UPDATE ON `products_price` FOR EACH ROW
        //     BEGIN
        //         INSERT INTO prices_history (`product_id`, `table_id`,`new_price`, `old_price`)
        //         VALUES (OLD.product_id, OLD.table_id, NEW.price, OLD.price);
        //     END
        // ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_price');

        // DB::unprepared('DROP TRIGGER `trigger_prices_history_update`');
    }
}
