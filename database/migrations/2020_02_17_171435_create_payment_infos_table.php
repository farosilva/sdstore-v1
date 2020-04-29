<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_info', function (Blueprint $table) {
            $table->char('transaction_code', 32);
            $table->char('notification_code', 36);
            $table->timestamp('notification_date');
            $table->string('payment_link', 200)->nullable();
            $table->timestamp('payment_validity')->nullable();
            $table->unsignedSmallInteger('status');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->primary(['transaction_code', 'notification_code']);
            $table->foreign('transaction_code')->references('transaction_code')->on('payments')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments_info');
    }
}
