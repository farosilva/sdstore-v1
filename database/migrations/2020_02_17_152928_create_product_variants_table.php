<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_variant', function (Blueprint $table) {
            $table->unsignedSmallInteger('product_id');
            $table->string('sku', 10)->unique();
            $table->char('product_code', 10);
            $table->string('technical_description', 400)->nullable();
            $table->string('marketing_description', 250)->nullable();
            $table->unsignedSmallInteger('subcategory_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->enum('status', ['A','I'])->default('I');

            $table->primary(['product_id','sku']);
            $table->foreign('product_id')->references('product_id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('subcategory_id')->on('subcategories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_variant');
    }
}
