<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->unsignedMediumInteger('user_id');
            $table->unsignedSmallInteger('contact_id');
            $table->string('function', 20)->nullable();
            $table->string('contact_name', 45);
            $table->decimal('phone_1', 11, 0);
            $table->decimal('phone_2', 11, 0)->nullable();
            $table->decimal('whatsapp', 11, 0)->nullable();
            $table->string('email', 60)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            // $table->enum('status', ['A','I'])->default('A');

            $table->primary(['user_id', 'contact_id']);
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
        Schema::dropIfExists('contacts');
    }
}
