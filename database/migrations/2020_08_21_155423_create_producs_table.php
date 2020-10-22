<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name', 64);
            $table->integer('category_id')->unsigned()->index();
            $table->integer('price');
            $table->string('description', 256);
            $table->integer('sale_status_id')->unsigned()->index();
            $table->integer('product_status_id')->unsigned()->index();
            $table->timestamp('regist_date');
            $table->integer('user_id')->unsigned()->index();
            $table->char('delete_flag', 1);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sale_status_id')->references('id')->on('sales_statuses')->onDelete('cascade');
            $table->foreign('product_status_id')->references('id')->on('products_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
