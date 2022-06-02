<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(config('cart.database.table', 'cart'), function (Blueprint $table) {
            $table->string('id');
            $table->string('instance');
            $table->longText('content');
            $table->nullableTimestamps();

            $table->primary(['id', 'instance']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop(config('cart.database.table', 'cart'));
    }
}
