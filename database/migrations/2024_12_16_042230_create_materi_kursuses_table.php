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
        Schema::create('materi_kursuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('kursus_id')->constrained()->onDelete('cascade');
            $table->string('file_materi');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi_kursuses');
    }
};
