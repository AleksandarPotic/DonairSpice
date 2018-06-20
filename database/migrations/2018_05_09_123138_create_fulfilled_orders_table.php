<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFulfilledOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fulfilled_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->double('total_price');
            $table->integer('quantity');
            $table->integer('product_id');
            $table->string('customer');
            $table->string('fulfilment_status');
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
        Schema::dropIfExists('fulfilled_orders');
    }
}
