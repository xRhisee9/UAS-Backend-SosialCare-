@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4 animated fadeIn">Edit Pengajuan Bantuan</h1>

    <div class="card shadow-sm p-4 animated fadeInUp animated-delay-1">
        <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="warga_id" class="form-label">Warga</label>
                {{-- Mengubah disabled menjadi readonly agar nilai tetap terkirim --}}
                <input type="text" class="form-control" value="{{ $pengajuan->warga->nama }} (NIK: {{ $pengajuan->warga->nik }})" readonly>
                <input type="hidden" name="warga_id" value="{{ $pengajuan->warga->id }}"> {{-- Tambahkan hidden input untuk mengirim ID --}}
                @error('warga_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jenis_bantuan_id" class="form-label">Jenis Bantuan</label>
                {{-- Mengubah disabled menjadi readonly agar nilai tetap terkirim --}}
                <input type="text" class="form-control" value="{{ $pengajuan->jenisBantuan->nama_bantuan }}" readonly>
                <input type="hidden" name="jenis_bantuan_id" value="{{ $pengajuan->jenisBantuan->id }}"> {{-- Tambahkan hidden input untuk mengirim ID --}}
                @error('jenis_bantuan_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                {{-- Mengubah disabled menjadi readonly agar nilai tetap terkirim --}}
                <input type="date" class="form-control @error('tanggal_pengajuan') is-invalid @enderror" id="tanggal_pengajuan" name="tanggal_pengajuan" value="{{ old('tanggal_pengajuan', $pengajuan->tanggal_pengajuan->format('Y-m-d')) }}" readonly>
                @error('tanggal_pengajuan')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="menunggu" {{ old('status', $pengajuan->status) == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="disetujui" {{ old('status', $pengajuan->status) == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="ditolak" {{ old('status', $pengajuan->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
                @error('status')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Perbarui Status</button>
            <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection