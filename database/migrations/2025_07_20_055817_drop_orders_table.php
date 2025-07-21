<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::dropIfExists('orders');
    }

    public function down(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('karyawan_id');
            $table->string('nama_pelanggan');
            $table->string('jenis_pelayanan');
            $table->string('harga');
            $table->timestamps();
        });
    }
};
