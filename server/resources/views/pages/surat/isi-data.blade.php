@extends('layouts.master-dashboard')

@section('header')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('surat.index') }}">Surat</a></li>
                        <li class="breadcrumb-item" aria-current="page">Isi Data</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Isi Data: {{ $surat->templateSurat->judul_surat }}</h2>
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
                <form action="/surat/{{ $surat->id }}/isi-data" method="POST">
                    @csrf
                    @foreach($surat_data as $data)
                        <div class="mb-3">
                            <label for="createJudul" class="form-label">{{ $data->label }}</label>
                            <input type="text" class="form-control" name="data[]" value="{{ $data->data }}" required>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Create Surat</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
