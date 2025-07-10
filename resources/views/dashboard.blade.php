@extends('layouts.admin')

@section('content')
<h1 class="mb-4 animated fadeIn">Dashboard</h1>

<div class="row">
    <div class="col-md-3 animated fadeInUp animated-delay-1">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Warga</h5>
                <p class="card-text fs-3">{{ $totalWarga }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 animated fadeInUp animated-delay-2">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Jenis Bantuan</h5>
                <p class="card-text fs-3">{{ $totalJenisBantuan }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 animated fadeInUp animated-delay-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Pengajuan</h5>
                <p class="card-text fs-3">{{ $totalPengajuan }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 animated fadeInUp animated-delay-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Distribusi</h5>
                <p class="card-text fs-3">{{ $totalDistribusi }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4 animated fadeInUp animated-delay-5">
        <div class="card mb-3">
            <div class="card-header bg-light">Status Pengajuan</div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Menunggu
                        <span class="badge bg-warning rounded-pill">{{ $pengajuanMenunggu }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Disetujui
                        <span class="badge bg-success rounded-pill">{{ $pengajuanDisetujui }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ditolak
                        <span class="badge bg-danger rounded-pill">{{ $pengajuanDitolak }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection