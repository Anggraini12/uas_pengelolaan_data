<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembuatansurats', function (Blueprint $table) {
            $table->id();
            $table->string('kode_surat')->unique();
            $table->string('jenis_surat');
            $table->string('nik'); // foreign key ke penduduks
            $table->string('file_surat');
            $table->timestamps();

            // Foreign key relasi ke penduduks.nik
            $table->foreign('nik')
                ->references('nik')
                ->on('penduduks')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembuatansurats');
    }
};
