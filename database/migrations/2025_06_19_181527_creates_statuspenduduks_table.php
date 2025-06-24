<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('statuspenduduks', function (Blueprint $table) {
            $table->char('nik', 16)->primary();
            $table->string('nama');
            $table->text('alamat');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('status');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('gol_darah')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('statuspenduduks');
    }
};
