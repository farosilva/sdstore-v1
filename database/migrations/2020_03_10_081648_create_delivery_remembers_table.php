<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryRemembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_remembers', function (Blueprint $table) {
            $table->id('seq');
            $table->string('email', 60);
            $table->decimal('post_code', 8,0);
            $table->decimal('city_code', 7,0);
            $table->timestamp('last_send_at')->nullable();
            $table->unsignedSmallInteger('send_counter')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_remembers');
    }
}
