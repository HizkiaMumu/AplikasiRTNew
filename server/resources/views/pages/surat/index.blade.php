@extends('layouts.master-dashboard')

@section('header')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('surat.index') }}">Surat</a></li>
                        <li class="breadcrumb-item" aria-current="page">List Surat</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">List Surat</h2>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('surat.create') }}" class="btn btn-primary">Create Surat</a>
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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Template Surat</th>
                                <th>Status</th>
                                @if (Auth::user()->role == 'admin')
                                    <th>Approval</th>
                                @endif
                                <th>Lampiran</th>
                                <th>Rating</th> <!-- Add column for Rating -->
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($surats as $surat)
                            <tr>
                                <td>{{ $surat->id }}</td>
                                <td>{{ $surat->user->name }}</td>
                                <td>{{ $surat->templateSurat->judul_surat }}</td>
                                <td>
                                    @if ($surat->status == 'pending')
                                        <span class="badge bg-warning text-dark">Menunggu Persetujuan</span>
                                    @elseif ($surat->status == 'approved')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif ($surat->status == 'rejected')
                                        <span class="badge bg-danger">Ditolak: {{ $surat->rejected_reason }}</span>
                                    @endif
                                </td>
                                @if (Auth::user()->role == 'admin')
                                    <td>
                                        <a href="/surat/{{ $surat->id }}/approve" class="btn btn-success btn-sm shadow-sm hover:bg-green-500 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">Setujui</a>
                                        <button class="btn btn-danger btn-sm shadow-sm hover:bg-red-500 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $surat->id }}">Tolak</button>
                                    </td>
                                @endif
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="lampiranDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            Download Lampiran
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="lampiranDropdown">
                                            @if ($surat->ktp)
                                                <li><a class="dropdown-item" href="{{ Storage::url($surat->ktp) }}" target="_blank">KTP</a></li>
                                            @endif
                                            @if ($surat->kk)
                                                <li><a class="dropdown-item" href="{{ Storage::url($surat->kk) }}" target="_blank">Kartu Keluarga</a></li>
                                            @endif
                                            @if ($surat->surat_keterangan_rt)
                                                <li><a class="dropdown-item" href="{{ Storage::url($surat->surat_keterangan_rt) }}" target="_blank">Surat Keterangan RT</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <!-- Display the average rating for the template_surat -->
                                    <span class="badge bg-info">
                                        {{ $surat->templateSurat->averageRating }} / 5
                                    </span>
                                </td>

                                <td>
                                    <!-- Check if user has already rated the template -->
                                    @php
                                        $userHasRated = $surat->templateSurat->ratings()->where('user_id', Auth::id())->exists();
                                    @endphp

                                    @if ($surat->rated)
                                        <a href="/surat/{{ $surat->id }}/isi-data" class="btn btn-success btn-sm shadow-sm hover:bg-green-500 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">Download Surat</a>
                                    @else
                                        <button class="btn btn-warning btn-sm shadow-sm hover:bg-yellow-500" data-bs-toggle="modal" data-bs-target="#ratingModal{{ $surat->id }}">Rating Surat</button>
                                        <a href="#" class="btn btn-secondary btn-sm shadow-sm hover:bg-green-500 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg" onclick="alert('Anda harus memberikan rating terlebih dahulu');">Download Surat</a>
                                    @endif

                                  
                                    <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm hover:bg-red-500 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Reject Modal -->
                            <div class="modal fade" id="rejectModal{{ $surat->id }}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rejectModalLabel">Tolak Surat - #{{ $surat->id }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('surat.reject', $surat->id) }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="rejected_reason">Alasan Ditolak</label>
                                                    <textarea class="form-control" name="rejected_reason" id="rejected_reason" rows="3" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Rating Modal -->
                            <div class="modal fade" id="ratingModal{{ $surat->id }}" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ratingModalLabel">Rate Template Surat - {{ $surat->templateSurat->judul_surat }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('ratings.store', $surat->template_surat_id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="surat_id" value="{{ $surat->id }}">
                                                <div class="form-group">
                                                    <label for="rating">Select Rating (1-5 Stars)</label>
                                                    <div class="d-flex justify-content-center" id="starRating{{ $surat->id }}">
                                                        <input type="hidden" name="rating" id="ratingValue{{ $surat->id }}" value="0">
                                                        <!-- Star rating icons (clickable) -->
                                                        <i class="ph-duotone ph-star" data-value="1" style="font-size: 50px;"></i>
                                                        <i class="ph-duotone ph-star" data-value="2" style="font-size: 50px;"></i>
                                                        <i class="ph-duotone ph-star" data-value="3" style="font-size: 50px;"></i>
                                                        <i class="ph-duotone ph-star" data-value="4" style="font-size: 50px;"></i>
                                                        <i class="ph-duotone ph-star" data-value="5" style="font-size: 50px;"></i>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit Rating</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <script>
                                // Handle star selection within the modal dynamically
                                document.querySelectorAll('#starRating{{ $surat->id }} i').forEach(star => {
                                    star.addEventListener('click', function() {
                                        // Get the rating value from the clicked star
                                        let ratingValue = this.getAttribute('data-value');
                                        
                                        // Set the hidden input value to the clicked star rating
                                        document.getElementById('ratingValue{{ $surat->id }}').value = ratingValue;

                                        // Update the color of the stars based on the selected rating
                                        document.querySelectorAll('#starRating{{ $surat->id }} i').forEach(starIcon => {
                                            if (starIcon.getAttribute('data-value') <= ratingValue) {
                                                // Set the color to gold (or any color you prefer for selected stars)
                                                starIcon.style.color = 'gold';
                                            } else {
                                                // Set the color to default (or any color you prefer for unselected stars)
                                                starIcon.style.color = '#ccc'; // Gray for unselected stars
                                            }
                                        });
                                    });
                                });
                            </script>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
