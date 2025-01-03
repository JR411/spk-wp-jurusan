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
        Schema::create('calon_mahasiswas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('peminatan_id')->unsigned();
            $table->string('calon_nama');
            $table->string('calon_asal_sekolah');
            $table->timestamps();

            $table->foreign('peminatan_id')->references('id')->on('peminatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_mahasiswas');
    }
};
