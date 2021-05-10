<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            // $table->json('product_id');
            // $table->timestamps();
            $table->string('full_name');
            $table->string('phone');
            // $table->string('address');
            $table->string('email');
            $table->string('address_order');
            $table->integer('is_pay')->default(0);
            // $table->integer('user_id');
            $table->integer('total');
            $table->unsignedInteger('payment_method_id');
            $table->unsignedInteger('vouchers_id');
            $table->unsignedInteger('statusorder_id');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
