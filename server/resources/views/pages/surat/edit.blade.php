@extends('layouts.master-dashboard')

@section('header')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('surat.index') }}">Surat</a></li>
                        <li class="breadcrumb-item" aria-current="page">Edit Surat</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Edit Surat</h2>
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
                <form action="{{ route('surat.update', $surat->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="template_surat_id" class="form-label">Template Surat</label>
                        <select class="form-control" name="template_surat_id" required>
                            @foreach ($templates as $template)
                                <option value="{{ $template->id }}" {{ $surat->template_surat_id == $template->id ? 'selected' : '' }}>
                                    {{ $template->judul_surat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Surat</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
