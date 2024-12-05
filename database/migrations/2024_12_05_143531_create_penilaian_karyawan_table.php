<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('penilaian_karyawan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('data_karyawan')->onDelete('cascade');
            $table->integer('c1')->default(0);
            $table->integer('c2')->default(0);
            $table->integer('c3')->default(0);
            $table->integer('c4')->default(0);
            $table->integer('c5')->default(0);
            $table->integer('c6')->default(0);
            $table->integer('c7')->default(0);
            $table->integer('c8')->default(0);
            $table->integer('c9')->default(0);
            $table->integer('c10')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_karyawan');
    }
}