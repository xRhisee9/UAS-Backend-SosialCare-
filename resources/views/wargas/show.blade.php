@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Detail Data Warga</h1>

    <div class="card shadow-sm p-4">
        <div class="row mb-3">
            <div class="col-md-3"><strong>Nama Lengkap:</strong></div>
            <div class="col-md-9">{{ $warga->nama }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>NIK:</strong></div>
            <div class="col-md-9">{{ $warga->nik }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Alamat:</strong></div>
            <div class="col-md-9">{{ $warga->alamat }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>No. HP:</strong></div>
            <div class="col-md-9">{{ $warga->no_hp ?? '-' }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Terdaftar Sejak:</strong></div>
            <div class="col-md-9">{{ $warga->created_at->format('d M Y H:i') }}</div>
        </div>
        <a href="{{ route('wargas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection