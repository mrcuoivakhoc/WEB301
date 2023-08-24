<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTagTable extends Migration
{
    public function up()
    {
        Schema::create('product_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            $table->index(['product_id', 'tag_id']);
            $table->foreign('product_id')->constrained('products')->onDelete('cascade');
            $table->foreign('tag_id')->rconstrained('tags')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('product_tag');
    }
};



