<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id(); // id_anggota
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('nis');
            $table->string('jurusan');
            $table->string('kelas');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
