<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyewa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_hp');
            $table->text('alamat');
            $table->date('tanggal_masuk');
            $table->foreignId('kamar_id')->nullable()->constrained('kamar')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyewa');
    }
};
