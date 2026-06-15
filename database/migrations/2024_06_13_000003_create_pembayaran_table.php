<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyewa_id')->constrained('penyewa')->onDelete('cascade');
            $table->date('tanggal_bayar');
            $table->decimal('jumlah_bayar', 10, 2);
            $table->string('bulan_tahun');
            $table->enum('status', ['lunas', 'pending'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
