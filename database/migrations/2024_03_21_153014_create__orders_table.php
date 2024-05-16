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
        Schema::create('_orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', 8, 2);
            $table->dateTime('dateorder');
            $table->string('route')->nullable();
            $table->string('status');
            $table->string('registerby');
            $table->unsignedBigInteger('id_customer');
            $table->foreign('id_customer')
                ->references('id')
                ->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_orders');
    }
};