<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id')->default(1)->after('id');
            $table->boolean('payment_status')->default(false);
            $table->foreign('city_id')->references('id')->on('cities');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_city_id_foreign');
            $table->dropColumn('city_id');
            $table->dropColumn('payment_status');
            $table->dropColumn('deleted_at');
        });
    }
}
