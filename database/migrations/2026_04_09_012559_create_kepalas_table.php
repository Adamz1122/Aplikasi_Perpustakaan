<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kepalas', function (Blueprint $table) {
            $table->id(); // id_kepala
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kepalas');
    }
};
