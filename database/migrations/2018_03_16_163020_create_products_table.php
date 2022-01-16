<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('productname');
            $table->integer('categoryid');
            $table->integer('subcategoryid');
            $table->integer('manufactureid');
            $table->text('productshortdescription');
            $table->text('productlongdescription');
            $table->integer('productquantity');
            $table->float('productprice',10,2);
            $table->text('productimage');
            $table->tinyInteger('featurename');
            $table->tinyInteger('publicationstatus');
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
