<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->string('nik')->primary(); // Primary key
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('status')->nullable(); // Menikah / Lajang, dll
            $table->enum('jk', ['Laki-laki', 'Perempuan']); // Jenis Kelamin
            $table->string('gol')->nullable(); // Golongan darah
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
