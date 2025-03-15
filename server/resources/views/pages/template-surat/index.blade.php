@extends('layouts.master-dashboard')

@section('header')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Template Surat</a></li>
                        <li class="breadcrumb-item" aria-current="page">List Template Surat</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">List Template Surat</h2>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" id="createTemplateBtn" style="border-radius: 255px;" data-bs-toggle="modal" data-bs-target="#createTemplateModal">
                            <i class="ph-duotone ph-upload-simple me-1"></i>Tambah Template Surat
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
                                <th>Judul Surat</th>
                                <th>File Surat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($templates as $template)
                                <tr>
                                    <td>{{ $template->id }}</td>
                                    <td>{{ $template->judul_surat }}</td>
                                    <td><a href="{{ asset('storage/'.$template->file_surat) }}" target="_blank">Download</a></td>
                                    <td>
                                        <a href="/template-keywords/{{ $template->id }}" class="btn btn-warning btn-sm">Keywords</a>
                                        <button class="btn btn-primary btn-sm editTemplateBtn" data-bs-toggle="modal" data-bs-target="#editTemplateModal"
                                                data-id="{{ $template->id }}" data-judul="{{ $template->judul_surat }}" data-file="{{ $template->file_surat }}">
                                            Edit
                                        </button>
                                        <a href="/template-surat/delete/{{ $template->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this template?')">Delete</a>
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
<div class="modal fade" id="createTemplateModal" tabindex="-1" aria-labelledby="createTemplateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTemplateModalLabel">Create Template Surat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createTemplateForm" action="{{ url('/template-surat/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="createJudul" class="form-label">Judul Surat</label>
                        <input type="text" class="form-control" name="judul_surat" id="createJudul" required>
                    </div>
                    <div class="mb-3">
                        <label for="createFile" class="form-label">File Surat</label>
                        <input type="file" class="form-control" name="file_surat" id="createFile" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Template</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<!-- Same structure as the Create Modal, with pre-populated data for editing -->
<div class="modal fade" id="editTemplateModal" tabindex="-1" aria-labelledby="editTemplateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTemplateModalLabel">Edit Template Surat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editTemplateForm" action="{{ route('template-surat.update', ['id' => ':id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="editJudul" class="form-label">Judul Surat</label>
                        <input type="text" class="form-control" name="judul_surat" id="editJudul" required>
                    </div>
                    <div class="mb-3">
                        <label for="editFile" class="form-label">File Surat</label>
                        <input type="file" class="form-control" name="file_surat" id="editFile">
                        <small class="form-text text-muted">If you don't want to change the file, leave this empty.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Template</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Script to populate the edit modal with existing data
    // Script to populate the edit modal with existing data
    const editTemplateBtns = document.querySelectorAll('.editTemplateBtn');

    editTemplateBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const judul = this.getAttribute('data-judul');
            const file = this.getAttribute('data-file');
            
            document.getElementById('editId').value = id;
            document.getElementById('editJudul').value = judul;
            
            // Update the form action with the correct ID for editing
            const formAction = `/template-surat/edit/${id}`;
            document.getElementById('editTemplateForm').action = formAction;
        });
    });
</script>

@endsection
