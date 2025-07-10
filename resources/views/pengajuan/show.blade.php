@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Detail Pengajuan Bantuan</h1>

    <div class="card shadow-sm p-4">
        <div class="row mb-3">
            <div class="col-md-3"><strong>Nama Warga:</strong></div>
            <div class="col-md-9">{{ $pengajuan->warga->nama }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>NIK Warga:</strong></div>
            <div class="col-md-9">{{ $pengajuan->warga->nik }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Alamat Warga:</strong></div>
            <div class="col-md-9">{{ $pengajuan->warga->alamat }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Jenis Bantuan:</strong></div>
            <div class="col-md-9">{{ $pengajuan->jenisBantuan->nama_bantuan }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Deskripsi Bantuan:</strong></div>
            <div class="col-md-9">{{ $pengajuan->jenisBantuan->deskripsi ?? '-' }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Tanggal Pengajuan:</strong></div>
            <div class="col-md-9">{{ $pengajuan->tanggal_pengajuan->format('d M Y') }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Status:</strong></div>
            <div class="col-md-9">
                <span class="badge
                    @if($pengajuan->status == 'menunggu') bg-warning
                    @elseif($pengajuan->status == 'disetujui') bg-success
                    @else bg-danger @endif">
                    {{ ucfirst($pengajuan->status) }}
                </span>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Dibuat Pada:</strong></div>
            <div class="col-md-9">{{ $pengajuan->created_at->format('d M Y H:i') }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Terakhir Diperbarui:</strong></div>
            <div class="col-md-9">{{ $pengajuan->updated_at->format('d M Y H:i') }}</div>
        </div>
        <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection