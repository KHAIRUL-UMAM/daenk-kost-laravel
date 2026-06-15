<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kamar')->unique();
            $table->decimal('harga', 10, 2);
            $table->text('fasilitas')->nullable();
            $table->enum('status', ['kosong', 'terisi'])->default('kosong');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
