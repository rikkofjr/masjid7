<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceZis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_invoice_zis', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->integer('jenis_zakat');
            $table->text('atas_nama');
            $table->integer('jumlah_jiwa');
            $table->bigInteger('uang_zakat');
            $table->bigInteger('uang_infaq');
            $table->string('gambar');
            $table->string('status');
            $table->string('perubah');
            $table->string('muzaki');
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
        Schema::dropIfExists('tb_invoice_zis');
    }
}
