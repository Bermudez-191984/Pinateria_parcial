<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detailsorders', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->decimal('price', 8, 2);
            $table->decimal('subtotal', 8, 2);

            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')
            ->references('id')
            ->on('products');

            $table->unsignedBigInteger('id__order');
            $table->foreign('id__order')
            ->references('id')
            ->on('_orders');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailsorders');
    }
};
