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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('secondname')->nullable();
            $table->string('lastname');
            $table->string('secondlastname')->nullable();
            $table->integer('age');
            $table->string('email');
            $table->string('document');
            $table->string('image')->nullable();
            $table->string('status');
            $table->string('registerby');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};