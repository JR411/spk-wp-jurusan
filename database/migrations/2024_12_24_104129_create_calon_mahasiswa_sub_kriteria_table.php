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
        Schema::create('calon_mahasiswa_sub_kriteria', function (Blueprint $table) {
            $table->foreignId('calon_mahasiswa_id')->constrained('calon_mahasiswas')->onDelete('cascade');
            $table->foreignId('sub_kriteria_id')->constrained('sub_kriterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_mahasiswa_sub_kriteria');
    }
};
