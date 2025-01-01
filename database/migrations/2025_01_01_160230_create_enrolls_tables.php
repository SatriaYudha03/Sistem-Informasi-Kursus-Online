<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi'); 
            $table->boolean('is_paid')->default(0); 
            $table->string('proof')->nullable(); 
            $table->string('jenis_pembayaran');
            $table->string('tanggal_enroll');
            $table->foreignId('user_id')->constrained(); 
            $table->foreignId('kelas_id')->constrained(); 
            $table->softDeletes();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolls');
    }
};
