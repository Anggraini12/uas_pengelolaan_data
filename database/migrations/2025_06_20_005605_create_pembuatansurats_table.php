<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembuatansurats', function (Blueprint $table) {
            $table->string('kode_surat')->primary();
            $table->string('jenis_surat');
            $table->char('nik', 16);
            $table->text('file_surat');
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('statuspenduduks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembuatansurats');
    }
};
