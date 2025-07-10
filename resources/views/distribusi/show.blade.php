@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Detail Distribusi Bantuan</h1>

    <div class="card shadow-sm p-4">
        <div class="row mb-3">
            <div class="col-md-3"><strong>ID Distribusi:</strong></div>
            <div class="col-md-9">{{ $distribusi->id }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>ID Pengajuan:</strong></div>
            <div class="col-md-9">{{ $distribusi->pengajuan->id }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Nama Warga:</strong></div>
            <div class="col-md-9">{{ $distribusi->pengajuan->warga->nama }} (NIK: {{ $distribusi->pengajuan->warga->nik }})</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Jenis Bantuan:</strong></div>
            <div class="col-md-9">{{ $distribusi->pengajuan->jenisBantuan->nama_bantuan }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Tanggal Pengajuan:</strong></div>
            <div class="col-md-9">{{ $distribusi->pengajuan->tanggal_pengajuan->format('d M Y') }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Tanggal Distribusi:</strong></div>
            <div class="col-md-9">{{ $distribusi->tanggal_distribusi->format('d M Y') }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Petugas:</strong></div>
            <div class="col-md-9">{{ $distribusi->petugas->name }} ({{ $distribusi->petugas->role }})</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Dibuat Pada:</strong></div>
            <div class="col-md-9">{{ $distribusi->created_at->format('d M Y H:i') }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Terakhir Diperbarui:</strong></div>
            <div class="col-md-9">{{ $distribusi->updated_at->format('d M Y H:i') }}</div>
        </div>
        <a href="{{ route('distribusi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection