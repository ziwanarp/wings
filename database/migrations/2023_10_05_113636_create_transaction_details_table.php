<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->string('document_code',3);
            $table->string('document_number',10);
            $table->foreignId('product_code');
            $table->decimal('price',10,2);
            $table->integer('quantity');
            $table->string('unit',5);
            $table->decimal('sub_total',10,2);
            $table->string('currency',5);
            $table->string('user',128);
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
        Schema::dropIfExists('transaction_details');
    }
};
