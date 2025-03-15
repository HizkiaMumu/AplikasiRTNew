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
        Schema::create('surat_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('surat_id')->unsigned();
            $table->string('label');
            $table->string('kode');
            $table->string('sumber_data')->nullable();
            $table->text('data')->nullable();
            $table->timestamps();

            $table->foreign('surat_id')->references('id')->on('surats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_data');
    }
};
