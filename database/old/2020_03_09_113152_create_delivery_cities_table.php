<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryCitiesTable extends Migration
{

    public function up()
    {
        Schema::create('delivery_cities', function (Blueprint $table) {
            $table->decimal('ibge_id', 7,0);
            $table->string('city_name', 30);
            $table->char('uf', 2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->enum('status', ['A','I'])->default('A');

            $table->primary('ibge_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_cities');
    }
}
