@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Detail Jenis Bantuan</h1>

    <div class="card shadow-sm p-4">
        <div class="row mb-3">
            <div class="col-md-3"><strong>Nama Bantuan:</strong></div>
            <div class="col-md-9">{{ $jenisBantuan->nama_bantuan }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Deskripsi:</strong></div>
            <div class="col-md-9">{{ $jenisBantuan->deskripsi ?? '-' }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Dibuat Pada:</strong></div>
            <div class="col-md-9">{{ $jenisBantuan->created_at->format('d M Y H:i') }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3"><strong>Terakhir Diperbarui:</strong></div>
            <div class="col-md-9">{{ $jenisBantuan->updated_at->format('d M Y H:i') }}</div>
        </div>
        <a href="{{ route('jenis-bantuan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection