<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_attribute', function (Blueprint $table) {
            $table->char('sku', 10);
            $table->unsignedSmallInteger('pack_id');
            $table->decimal('qtde_pack', 6,0);
            $table->decimal('weight', 8,4);
            $table->enum('unit', ['g','ml']);
            $table->decimal('minimal_stock', 2,0);
            $table->boolean('featured');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

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
        Schema::dropIfExists('products_attribute');
    }
}
