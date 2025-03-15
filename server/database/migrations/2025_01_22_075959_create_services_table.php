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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('member_id')->unsigned()->nullable();
            $table->bigInteger('cs_id')->unsigned()->nullable();
            $table->bigInteger('teknisi_id')->unsigned()->nullable();

            $table->string('model_iphone');
            $table->string('nomor_seri_imei');
            $table->string('versi_ios');

            $table->string('masuk_back_camera_05');
            $table->string('masuk_back_camera_x1');
            $table->string('masuk_back_camera_x2');
            $table->string('masuk_battery_health');
            $table->string('masuk_battery_health_notes');
            $table->string('masuk_buzzer');
            $table->string('masuk_charging_port_ampere');
            $table->string('masuk_charging_port_ampere_notes');
            $table->string('masuk_contras_true_tone');
            $table->string('masuk_earpiece');
            $table->string('masuk_face_id');
            $table->string('masuk_flashlight');
            $table->string('masuk_front_camera');
            $table->string('masuk_gsm_4g');
            $table->string('masuk_lcd_ts');
            $table->string('masuk_lcd_ts_notes');
            $table->string('masuk_mic_record');
            $table->string('masuk_proximity');
            $table->string('masuk_silent_mode');
            $table->string('masuk_taptic_engine');
            $table->string('masuk_volume_up_down_on_off');
            $table->string('masuk_wifi_bluetooth');

            
            $table->string('keluar_lcd_ts');
            $table->string('keluar_lcd_ts_notes');
            $table->string('keluar_battery_health');
            $table->string('keluar_battery_health_notes');
            $table->string('keluar_charging_port_ampere');
            $table->string('keluar_charging_port_ampere_notes');
            $table->string('keluar_earpiece');
            $table->string('keluar_proximity');
            $table->string('keluar_front_camera');
            $table->string('keluar_volume_up_down_on_off');
            $table->string('keluar_silent_mode');
            $table->string('keluar_mic_record');
            $table->string('keluar_contras_true_tone');
            $table->string('keluar_gsm_4g');
            $table->string('keluar_wifi_bluetooth');
            $table->string('keluar_flashlight');
            $table->string('keluar_taptic_engine');
            $table->string('keluar_buzzer');
            $table->string('keluar_face_id');
            $table->string('keluar_touch_id');
            $table->string('keluar_back_camera_05');
            $table->string('keluar_back_camera_x1');
            $table->string('keluar_back_camera_x2');
            $table->string('keluar_unit_mati_total');
            
            $table->string('keluhan_masalah_device');
            $table->string('kelengkapan');
            $table->string('remark_sr');
            $table->string('remark_unit');
            $table->string('note_masuk');
            $table->string('note_keluar');

            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('cs_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('teknisi_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
