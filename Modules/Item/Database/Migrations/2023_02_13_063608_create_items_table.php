<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name')->unique();
            $table->string('item_slug')->unique();
            $table->bigInteger('item_price');
            $table->date('item_purchase_date');
            $table->text('item_include')->nullable();
            $table->string('item_image');
            $table->text('item_description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
};
