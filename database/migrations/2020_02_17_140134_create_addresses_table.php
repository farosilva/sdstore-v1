<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->unsignedMediumInteger('user_id');
            $table->unsignedSmallInteger('address_id');
            $table->string('address_name', 15);
            $table->string('street_name', 60);
            $table->decimal('number', 6, 0);
            $table->string('complem', 15)->nullable();
            $table->string('district', 30);
            $table->string('city', 30);
            $table->enum('state', ['SP']);
            $table->decimal('city_code', 7, 0);
            $table->decimal('post_code', 8, 0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->enum('status', ['A','I'])->default('A');

            $table->primary(['user_id', 'address_id']);
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
