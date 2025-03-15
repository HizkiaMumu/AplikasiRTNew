@extends('layouts.master-dashboard')

@section('header')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Members</a></li>
                        <li class="breadcrumb-item" aria-current="page">List Members</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">List Members</h2>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" id="createMemberBtn" style="border-radius: 255px;" data-bs-toggle="modal" data-bs-target="#memberModal">
                            <i class="ph-duotone ph-upload-simple me-1"></i>Tambah Member
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
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->phone_number }}</td>
                                    <td>{{ $member->address }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#memberModal"
                                                data-id="{{ $member->id }}" data-name="{{ $member->name }}" data-phone_number="{{ $member->phone_number }}"
                                                data-address="{{ $member->address }}">
                                            Edit
                                        </button>
                                        <!-- Delete Button -->
                                         <a href="/members/delete/{{ $member->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this member?')">Delete</a>
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

<!-- Create/Edit Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="memberModalLabel">Create Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="memberForm" action="{{ isset($member) ? url('/members/edit/'.$member->id) : url('/members/create') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" name="id" id="memberId" value="{{ isset($memberId) ? $memberId : '' }}">
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', isset($member) ? $member->name : '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number', isset($member) ? $member->phone_number : '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="3" required>{{ old('address', isset($member) ? $member->address : '') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
