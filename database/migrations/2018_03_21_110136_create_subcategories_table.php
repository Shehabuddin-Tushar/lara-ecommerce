<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoryid');
            $table->string('subcategoryname');
            $table->string('subcategorydescriptiontitle');
            $table->text('subcategorydescription');
            $table->text('subcategoryimage');
            $table->text('subcategorysliderimageone');
            $table->text('subcategorysliderimagetwo');
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
        Schema::dropIfExists('subcategories');
    }
}
