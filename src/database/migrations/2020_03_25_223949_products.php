<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
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
            $table->integer('category_id')->unsigned();
            $table->string('brand');
            $table->string('description');
            $table->tinyInteger('gender')->unsigned();
            $table->string('price');
            $table->string('photo');
            $table->boolean('status');
            $table->integer('stock');
            $table->timestamps();
           /*
            $table->foreign('category_id') // Urun category_id ile categories tablosundaki id ile baglantı kuruldu
                ->references('id')
                ->on('categories')
                ->onDelete('cascade') baglı oldugu veri tablodan silinirse urun tablosundan ona baglı olanlarda silinir bu metodla
                ;*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
