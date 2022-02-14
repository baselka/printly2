<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->default(0);
            $table->integer("complete")->default(0);
            $table->string("total");
            $table->string("cover_price");
            $table->string("print_price");


            $table->timestamps();
        });
        Schema::create('custom_products_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId("custom_product")->default(0);
            $table->string("number_of_pages");
            $table->string("parent")->default(0);
            $table->string("combind")->default(0);
            $table->string("fileId")->default(0);

            $table->string("file");
            $table->string("price");
            $table->foreignId("cover_type")->default(0);
            $table->string("cover_side")->default(0);
            $table->string("quantity")->default(1);
            $table->string("total")->default(0);
            $table->string("cover_price")->default(0);
            $table->string("paper_type")->default(0);
            $table->string("printer_method")->default(0);
            $table->string("printer_type")->default(0);
            $table->string("paper_slice")->default(0);
            $table->string("printer_color")->default(0);

            $table->integer("from")->default(0);
            $table->integer("to")->default(0);
            $table->foreignId("price_id")->default(0);

        });

        Schema::create('merged_files_cover', function (Blueprint $table) {
            $table->id();
            $table->foreignId("custom_product")->default(0);
            $table->foreignId("cover_id")->default(0);
            $table->string("files")->default('');
            $table->string("price")->default(0);
            $table->string("cover_side")->default(0);
            $table->string("number_of_pages")->default(0);


        });

        Schema::create('files_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("file_id")->default(0);
            $table->string("from");
            $table->string("to");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_products');
    }
}
