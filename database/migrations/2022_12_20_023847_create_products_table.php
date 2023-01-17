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
            $table->id();
            $table->date('tanggal');
            $table->foreignId('user_id')->index('fk_product_to_user');
            $table->foreignId('kategori_id')->index('fk_product_to_categorie');
            $table->double('modal');
            $table->string('barang');
            $table->double('jumlah');
            $table->double('harga_jual');
            $table->double('laba');
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
};
