<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_penjualan', function (Blueprint $table) {
            $table->id('penjualan_id');
            $table->unsignedBigInteger('user_id')->index(); //indexing untuk foreignkey
            $table->string('pembeli', 50)->unique(); //unique memastikan tidak ada yang sama 
            $table->string('penjualan_kode',20);
            $table->dateTime('penjualan_tanggal');
            $table->timestamps();

            //mendefinisikan foreignkey pada kolom level_id mengacu pada kolom level_id di tabel m_user
            $table->foreign('user_id')->references('user_id')->on('m_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan');
    }
};
