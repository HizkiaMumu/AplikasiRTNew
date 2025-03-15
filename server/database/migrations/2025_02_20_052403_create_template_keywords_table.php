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
        Schema::create('template_keywords', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('template_surat_id')->unsigned();
            $table->string('label');
            $table->string('kode');
            $table->enum('sumber_data', ['nik', 'nama', 'alamat'])->nullable();
            $table->timestamps();

            $table->foreign('template_surat_id')->references('id')->on('template_surats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('template_keywords');
    }
};
