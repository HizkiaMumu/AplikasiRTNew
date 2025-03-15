@extends('layouts.master-dashboard')

@section('header')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Template Surat</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('template-keywords.index', $templateSurat->id) }}" aria-current="page">Template Keywords</a></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Template Keywords for {{ $templateSurat->judul_surat }}</h2>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" id="createKeywordBtn" style="border-radius: 255px;" data-bs-toggle="modal" data-bs-target="#createKeywordModal">
                            <i class="ph-duotone ph-upload-simple me-1"></i>Tambah Keyword
                        </button>
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
                <div class="table-responsive">
                    <table class="table table-hover" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Label</th>
                                <th>Kode</th>
                                <th>Sumber Data</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keywords as $keyword)
                                <tr>
                                    <td>{{ $keyword->id }}</td>
                                    <td>{{ $keyword->label }}</td>
                                    <td>{{ $keyword->kode }}</td>
                                    <td>{{ $keyword->sumber_data }}</td>
                                    <td>
                                        <a href="{{ route('template-keywords.delete', $keyword->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this keyword?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createKeywordModal" tabindex="-1" aria-labelledby="createKeywordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createKeywordModalLabel">Create Template Keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('template-keywords.create') }}" method="POST">
                    @csrf
                    <input type="hidden" name="template_surat_id" value="{{ $templateSurat->id }}">
                    <div class="mb-3">
                        <label for="label" class="form-label">Label</label>
                        <input type="text" class="form-control" name="label" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control" name="kode" required>
                    </div>
                    <div class="mb-3">
                        <label for="sumber_data" class="form-label">Sumber Data</label>
                        <select class="form-control" name="sumber_data">
                            <option>Tidak Ada</option>
                            <option value="nik">NIK</option>
                            <option value="nama">Nama</option>
                            <option value="alamat">Alamat</option>
                            <option value="jenis_kelamin">Jenis Kelamin</option>
                            <option value="tempat_tanggal_lahir">Tempat, Tanggal Lahir</option>
                            <option value="warga_negara">Warga Negara</option>
                            <option value="pekerjaan">Pekerjaan</option>
                            <option value="nomor_surat">Nomor Surat</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Keyword</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editKeywordModal" tabindex="-1" aria-labelledby="editKeywordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKeywordModalLabel">Edit Template Keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('template-keywords.update', ':id') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="editLabel" class="form-label">Label</label>
                        <input type="text" class="form-control" name="label" id="editLabel" required>
                    </div>
                    <div class="mb-3">
                        <label for="editKode" class="form-label">Kode</label>
                        <input type="text" class="form-control" name="kode" id="editKode" required>
                    </div>
                    <div class="mb-3">
                        <label for="editSumberData" class="form-label">Sumber Data</label>
                        <select class="form-control" name="sumber_data" id="editSumberData">
                            <option value="nik">NIK</option>
                            <option value="nama">Nama</option>
                            <option value="alamat">Alamat</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Keyword</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const editKeywordBtns = document.querySelectorAll('.editKeywordBtn');

    editKeywordBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const label = this.getAttribute('data-label');
            const kode = this.getAttribute('data-kode');
            const sumber = this.getAttribute('data-sumber');

            document.getElementById('editId').value = id;
            document.getElementById('editLabel').value = label;
            document.getElementById('editKode').value = kode;
            document.getElementById('editSumberData').value = sumber;

            const formAction = `/template-keywords/edit/${id}`;
            document.forms[1].action = formAction;
        });
    });
</script>
@endsection
