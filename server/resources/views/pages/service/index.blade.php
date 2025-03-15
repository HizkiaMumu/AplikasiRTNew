@extends('layouts/master-dashboard')
@section('header')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Service</a></li>
                        <li class="breadcrumb-item" aria-current="page">List Service</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">List Service</h2>
                    </div>
                    <div class="mt-3">
                        <a href="/service/tambah-service" class="btn btn-primary d-inline-flex" style="border-radius: 255px;"><i class="ph-duotone ph-upload-simple me-1"></i>Tambah Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

<div class="col-md-12 row">
    <div class="col-md-6">
        <div class="card statistics-card-1">
            <div class="card-body">
                <img src="/assets/images/widget/img-status-3.svg" alt="img" class="img-fluid img-bg">
                <div class="d-flex align-items-center">
                <div class="avtar bg-brand-color-3 text-white me-3">
                    <i class="ph-duotone ph-users-four f-26"></i>
                </div>
                <div>
                    <p class="text-muted mb-0">On Progress Hari Ini</p>
                    <div class="d-flex align-items-end">
                    <h2 class="mb-0 f-w-500">{{ count($services) }} Unit</h2>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card statistics-card-1">
            <div class="card-body">
                <img src="/assets/images/widget/img-status-3.svg" alt="img" class="img-fluid img-bg">
                <div class="d-flex align-items-center">
                <div class="avtar bg-brand-color-3 text-white me-3">
                    <i class="ph-duotone ph-users-four f-26"></i>
                </div>
                <div>
                    <p class="text-muted mb-0">Unit Selesai Hari Ini</p>
                    <div class="d-flex align-items-end">
                    <h2 class="mb-0 f-w-500">0 Unit</h2>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="card border-0 table-card user-profile-list">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Member</th>
                                    <th>Tipe Unit</th>
                                    <th>Keluhan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->member->name }}</td>
                                        <td>{{ $service->model_iphone }}</td>
                                        <td>{{ $service->keluhan_masalah_device }}</td>
                                        <td>{{ $service->status }}</td>
                                        <!-- <td>
                                            <ul class="status-steps">
                                                <li class="step">
                                                    <i class="fa fa-clock"></i>
                                                    <span>Pending</span>
                                                </li>
                                                <li class="step">
                                                    <i class="fa fa-check"></i>
                                                    <span>On Check</span>
                                                </li>
                                                <li class="step">
                                                    <i class="fa fa-question-circle"></i>
                                                    <span>Confirmation</span>
                                                </li>
                                                <li class="step">
                                                    <i class="fa fa-cogs"></i>
                                                    <span>On Progress</span>
                                                </li>
                                                <li class="step">
                                                    <i class="fa fa-check-circle"></i>
                                                    <span>Done</span>
                                                </li>
                                            </ul>
                                        </td> -->
                                        <td>
                                            <a href="/service/edit-service/{{ $service->id }}" class="btn btn-info">Details</a>
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
</div>

<!-- Add this CSS to style the steps as a horizontal list -->
<style>
    .status-steps {
        display: flex;
        justify-content: space-between;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .step {
        text-align: center;
        font-size: 14px;
        padding: 5px 10px;
        position: relative;
    }
    .step i {
        font-size: 20px;
        display: block;
        margin-bottom: 5px;
    }
    .step span {
        display: block;
        color: #666;
    }
    .step.completed {
        color: green;
    }
    .step.active {
        color: #007bff;
    }
    .step.completed i {
        color: green;
    }
    .step.active i {
        color: #007bff;
    }
    .step:last-child {
        margin-right: 0;
    }
</style>

    <!-- [ sample-page ] end -->
</div>

@endsection
@section('script')

<script src="/assets/js/plugins/simple-datatables.js"></script>
<script>
    const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
        sortable: true,
        perPage: 5
    });
</script>

@endsection