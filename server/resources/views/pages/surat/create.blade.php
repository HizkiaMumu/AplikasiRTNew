@extends('layouts.master-dashboard')

@section('header')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('surat.index') }}">Surat</a></li>
                        <li class="breadcrumb-item" aria-current="page">Create Surat</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Create Surat</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="template_surat_id" class="form-label">Template Surat</label>
                        <select class="form-control" name="template_surat_id" required>
                            <option value="">Select Template</option>
                            @foreach ($templates as $template)
                                <option value="{{ $template->id }}">{{ $template->judul_surat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="ktp" class="form-label">KTP</label>
                        <input type="file" class="form-control" name="ktp" accept="image/*,.pdf" required>
                    </div>

                    <div class="mb-3">
                        <label for="kk" class="form-label">Kartu Keluarga (KK)</label>
                        <input type="file" class="form-control" name="kk" accept="image/*,.pdf" required>
                    </div>

                    <div class="mb-3">
                        <label for="surat_keterangan_rt" class="form-label">Surat Keterangan RT</label>
                        <input type="file" class="form-control" name="surat_keterangan_rt" accept="image/*,.pdf" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Surat</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
