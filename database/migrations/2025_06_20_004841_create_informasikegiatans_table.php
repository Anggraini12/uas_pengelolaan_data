<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('informasikegiatans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_kegiatan');
            $table->text('kegiatan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informasikegiatans');
    }
};
