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
        Schema::create('tables_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100)->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('email',150)->nullable();
            $table->string('note',700)->nullable();
            $table->integer('persons')->nullable();
            $table->integer('tables')->nullable();
            $table->date('book_date')->nullable();
            $table->time('book_time')->nullable();
            $table->time('expiry')->nullable();
            $table->integer('restaurent_id')->nullable();
            $table->string('status',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables_bookings');
    }
};
