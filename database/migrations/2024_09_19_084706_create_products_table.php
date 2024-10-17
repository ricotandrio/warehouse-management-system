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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100)->unique();
            $table->string('sku')->unique();
            $table->text('description')->nullable();
            $table->string('image');
            $table->decimal('price', 10, 2);
            $table->integer('stock_quantity');

            $table->uuid('manufacturer_id');
            $table->uuid('category_id');

            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->foreign('category_id')->references('id')->on('product_categories');

            $table->timestampTz('created_at');
            $table->uuid('created_by');
            $table->timestampTz('updated_at')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->timestampTz('deleted_at')->nullable();
            $table->uuid('deleted_by')->nullable();
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
};
