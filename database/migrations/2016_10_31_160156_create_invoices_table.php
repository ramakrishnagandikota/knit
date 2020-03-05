<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('subscription_id')->nullable();
            $table->string('sub_type',100)->nullable();
            $table->integer('is_recurring')->nullable();
            $table->string('title',100)->nullable();
            $table->integer('qty')->nullable();
            $table->double('price', 2)->nullable();
            $table->boolean('paid')->nullable();
            $table->string('payerid',100)->nullable();
            $table->string('TOKEN',100)->nullable();
            $table->string('TIMESTAMP',100)->nullable();
            $table->string('CORRELATIONID',100)->nullable();
            $table->string('ACK',100)->nullable();
            $table->string('PROFILEID',100)->nullable();
            $table->string('PROFILESTATUS',100)->nullable();
            $table->longText('fulldata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
