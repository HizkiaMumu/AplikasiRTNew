@extends('layouts/master-dashboard')

@section('header')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Service iPhone</a></li>
                        <li class="breadcrumb-item" aria-current="page">Tambah Data Service</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Form Service iPhone</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Form Service iPhone</h5>
            </div>
            <div class="card-body">
                <form action="/service/tambah-service" method="POST">
                    {{ csrf_field() }}

                    <!-- Data Konsumen -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Pilih Konsumen</label>
                                <select name="member_id" class="form-select" required>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }} | {{ $member->phone_number }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Pilih konsumen yang sesuai</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Pilih Customer Service</label>
                                <select name="cs_id" class="form-select" required>
                                    @foreach($cs as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Pilih konsumen yang sesuai</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Pilih Teknisi</label>
                                <select name="teknisi_id" class="form-select" required>
                                    @foreach($teknisi as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Pilih konsumen yang sesuai</small>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Device -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Model iPhone</label>
                                <input type="text" name="model_iphone" class="form-control" placeholder="Masukkan model iPhone" required>
                                <small class="form-text text-muted">Contoh: iPhone 12, iPhone 13 Pro, dsb.</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nomor Seri / IMEI</label>
                                <input type="text" name="nomor_seri_imei" class="form-control" placeholder="Masukkan nomor seri atau IMEI" required>
                                <small class="form-text text-muted">Masukkan nomor seri atau IMEI perangkat iPhone</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Versi iOS</label>
                        <input type="text" name="versi_ios" class="form-control" placeholder="Masukkan versi iOS" required>
                        <small class="form-text text-muted">Versi iOS perangkat iPhone</small>
                    </div>

                    <!-- Checklist Komponen untuk Diperiksa -->
                    <!-- Checklist Masuk -->
                    <div class="mb-3">
                        <label class="form-label">Checklist Masuk</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_back_camera_05" value="1">
                                    <label class="form-check-label">Back Camera 0.5</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_back_camera_x1" value="1">
                                    <label class="form-check-label">Back Camera x1</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_back_camera_x2" value="1">
                                    <label class="form-check-label">Back Camera x2</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_battery_health" value="1">
                                    <label class="form-check-label">Battery Health</label>
                                    <input type="text" style="width: 100px !important; height: 20px;" name="masuk_battery_health_notes">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_buzzer" value="1">
                                    <label class="form-check-label">Buzzer</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_charging_port_ampere" value="1">
                                    <label class="form-check-label">Charging Port / Ampere</label>
                                    <input type="text" style="width: 100px !important; height: 20px;" name="masuk_charging_port_ampere_notes">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_contras_true_tone" value="1">
                                    <label class="form-check-label">Contras / True Tone</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_earpiece" value="1">
                                    <label class="form-check-label">Earpiece</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_face_id" value="1">
                                    <label class="form-check-label">Face ID</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_flashlight" value="1">
                                    <label class="form-check-label">Flashlight</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_front_camera" value="1">
                                    <label class="form-check-label">Front Camera</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_gsm_4g" value="1">
                                    <label class="form-check-label">GSM / 4G</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_lcd_ts" value="1">
                                    <label class="form-check-label">LCD / TS</label>
                                    <input type="text" style="width: 100px !important; height: 20px;" name="masuk_lcd_ts_notes">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_mic_record" value="1">
                                    <label class="form-check-label">Mic Record</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_proximity" value="1">
                                    <label class="form-check-label">Proximity</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_silent_mode" value="1">
                                    <label class="form-check-label">Silent Mode</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_taptic_engine" value="1">
                                    <label class="form-check-label">Taptic Engine</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_volume_up_down_on_off" value="1">
                                    <label class="form-check-label">Vol up / Down - On / Off</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="masuk_wifi_bluetooth" value="1">
                                    <label class="form-check-label">Wifi / Bluetooth</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Checklist Keluar -->
                    <div class="mb-3">
                        <label class="form-label">Checklist Keluar</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_lcd_ts" value="1">
                                    <label class="form-check-label">LCD / TS</label>
                                    <input type="text" style="width: 100px !important; height: 20px;" name="keluar_lcd_ts_notes">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_battery_health" value="1">
                                    <label class="form-check-label">Battery Health</label>
                                    <input type="text" style="width: 100px !important; height: 20px;" name="keluar_battery_health_notes">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_charging_port_ampere" value="1">
                                    <label class="form-check-label">Charging Port / Ampere</label>
                                    <input type="text" style="width: 100px !important; height: 20px;" name="keluar_charging_port_ampere_notes">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_earpiece" value="1">
                                    <label class="form-check-label">Earpiece</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_proximity" value="1">
                                    <label class="form-check-label">Proximity</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_front_camera" value="1">
                                    <label class="form-check-label">Front Camera</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_volume_up_down_on_off" value="1">
                                    <label class="form-check-label">Vol up / Down - On / Off</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_silent_mode" value="1">
                                    <label class="form-check-label">Silent Mode</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_mic_record" value="1">
                                    <label class="form-check-label">Mic Record</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_contras_true_tone" value="1">
                                    <label class="form-check-label">Contras / True Tone</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_gsm_4g" value="1">
                                    <label class="form-check-label">GSM / 4G</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_wifi_bluetooth" value="1">
                                    <label class="form-check-label">Wifi / Bluetooth</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_flashlight" value="1">
                                    <label class="form-check-label">Flashlight</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_taptic_engine" value="1">
                                    <label class="form-check-label">Taptic Engine</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_buzzer" value="1">
                                    <label class="form-check-label">Buzzer</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_face_id" value="1">
                                    <label class="form-check-label">Face ID</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_touch_id" value="1">
                                    <label class="form-check-label">Touch ID</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_back_camera_05" value="1">
                                    <label class="form-check-label">Back Camera 0.5</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_back_camera_x1" value="1">
                                    <label class="form-check-label">Back Camera x1</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_back_camera_x2" value="1">
                                    <label class="form-check-label">Back Camera x2</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keluar_unit_mati_total" value="1">
                                    <label class="form-check-label">Unit Mati Total</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Keluhan -->
                    <div class="mb-3">
                        <label class="form-label">Keluhan / Masalah pada Device</label>
                        <textarea name="keluhan_masalah_device" class="form-control" placeholder="Tuliskan keluhan atau masalah pada perangkat" required></textarea>
                        <small class="form-text text-muted">Jelaskan secara rinci keluhan atau masalah pada perangkat</small>
                    </div>

                    <!-- Kelengkapan -->
                    <div class="mb-3">
                        <label class="form-label">Kelengkapan</label>
                        <textarea name="kelengkapan" class="form-control" placeholder="Tuliskan kelengkapan yang disertakan (misal: charger, box, dll)" required></textarea>
                        <small class="form-text text-muted">Tuliskan barang-barang yang disertakan saat service</small>
                    </div>

                    <!-- Remark SR -->
                    <div class="mb-3">
                        <label class="form-label">Remark SR</label>
                        <textarea name="remark_sr" class="form-control" placeholder="Tuliskan remark atau keterangan SR (jika ada)"></textarea>
                        <small class="form-text text-muted">Jika ada catatan khusus mengenai SR</small>
                    </div>

                    <!-- Remark Unit -->
                    <div class="mb-3">
                        <label class="form-label">Remark Unit</label>
                        <textarea name="remark_unit" class="form-control" placeholder="Tuliskan remark atau keterangan unit (jika ada)"></textarea>
                        <small class="form-text text-muted">Catatan mengenai unit yang diservis</small>
                    </div>

                    <!-- Note Masuk -->
                    <div class="mb-3">
                        <label class="form-label">Note Masuk</label>
                        <textarea name="note_masuk" class="form-control" placeholder="Tuliskan catatan saat barang masuk untuk service" required></textarea>
                        <small class="form-text text-muted">Catatan mengenai keadaan barang saat diterima</small>
                    </div>

                    <!-- Note Keluar -->
                    <div class="mb-3">
                        <label class="form-label">Note Keluar</label>
                        <textarea name="note_keluar" class="form-control" placeholder="Tuliskan catatan saat barang keluar dari service" required></textarea>
                        <small class="form-text text-muted">Catatan mengenai keadaan barang setelah service</small>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3 mt-3 text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Kirim Permintaan Service</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="/assets/js/plugins/choices.min.js"></script>
<script src="/assets/js/plugins/apexcharts.min.js"></script>
<script src="/assets/js/plugins/simple-datatables.js"></script>

<script>
    // Menambahkan validasi interaktif atau tambahan jika diperlukan
</script>
@endsection
