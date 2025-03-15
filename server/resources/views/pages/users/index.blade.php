@extends('layouts.master-dashboard')

@section('header')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Users</a></li>
                        <li class="breadcrumb-item" aria-current="page">List User</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">List User</h2>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" id="createUserBtn" style="border-radius: 255px;" data-bs-toggle="modal" data-bs-target="#createUserModal">
                            <i class="ph-duotone ph-upload-simple me-1"></i>Tambah User
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm editUserBtn" data-bs-toggle="modal" data-bs-target="#editUserModal"
                                                data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}"
                                                data-role="{{ $user->role }}">
                                            Edit
                                        </button>
                                        <a href="/users/delete/{{ $user->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
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
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createUserForm" action="{{ url('/users/create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="createName" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="createName" required>
                    </div>
                    <div class="mb-3">
                        <label for="createEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="createEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="createRole" class="form-label">Role</label>
                        <select class="form-select" name="role" id="createRole" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="cs">CS</option>
                            <option value="teknisi">Teknisi</option>
                            <option value="owner">Owner</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="createPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="createPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" action="{{ url('/users/edit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="editUserId">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="editName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="editEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="editRole" class="form-label">Role</label>
                        <select class="form-select" name="role" id="editRole" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="cs">CS</option>
                            <option value="teknisi">Teknisi</option>
                            <option value="owner">Owner</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="editPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Populate Edit Modal with user data
    document.querySelectorAll('.editUserBtn').forEach(button => {
        button.addEventListener('click', function () {
            const userId = this.dataset.id;
            const userName = this.dataset.name;
            const userEmail = this.dataset.email;
            const userRole = this.dataset.role;

            document.getElementById('editUserId').value = userId;
            document.getElementById('editName').value = userName;
            document.getElementById('editEmail').value = userEmail;
            document.getElementById('editRole').value = userRole;
        });
    });
</script>
@endsection
