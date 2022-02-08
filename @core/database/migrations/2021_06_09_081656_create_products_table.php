<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->string('sub_category_id')->nullable();
            $table->text('title')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('attributes_title')->nullable();
            $table->longText('attributes_description')->nullable();
            $table->string('badge')->nullable();
            $table->text('slug')->nullable();
            $table->string('sku')->nullable();
            $table->string('stock_status')->nullable();
            $table->string('total_sold')->nullable();
            $table->string('image')->nullable();
            $table->string('gallery')->nullable();
            $table->string('is_downloadable')->nullable();
            $table->string('downloadable_file')->nullable();
            $table->string('regular_price')->nullable();
            $table->string('sale_price')->nullable();
            $table->integer('sales')->nullable();
            $table->integer('tax_percentage')->nullable();
            $table->string('is_featured')->nullable();
            $table->string('status')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_tags')->nullable();
            $table->text('og_meta_description')->nullable();
            $table->text('og_meta_title')->nullable();
            $table->text('og_meta_image')->nullable();
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
        Schema::dropIfExists('products');
    }
}
