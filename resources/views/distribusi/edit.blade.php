@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Edit Distribusi Bantuan</h1>

    <div class="card shadow-sm p-4">
        <form action="{{ route('distribusi.update', $distribusi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="pengajuan_id" class="form-label">Pengajuan Bantuan</label>
                <select class="form-select @error('pengajuan_id') is-invalid @enderror" id="pengajuan_id" name="pengajuan_id" required>
                    @foreach($pengajuans as $pengajuan)
                        <option value="{{ $pengajuan->id }}" {{ old('pengajuan_id', $distribusi->pengajuan_id) == $pengajuan->id ? 'selected' : '' }}>
                            ID: {{ $pengajuan->id }} - {{ $pengajuan->warga->nama }} ({{ $pengajuan->jenisBantuan->nama_bantuan }})
                        </option>
                    @endforeach
                </select>
                @error('pengajuan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal_distribusi" class="form-label">Tanggal Distribusi</label>
                <input type="date" class="form-control @error('tanggal_distribusi') is-invalid @enderror" id="tanggal_distribusi" name="tanggal_distribusi" value="{{ old('tanggal_distribusi', $distribusi->tanggal_distribusi->format('Y-m-d')) }}" required>
                @error('tanggal_distribusi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="petugas_id" class="form-label">Petugas Distribusi</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }} (Anda)" disabled>
                <input type="hidden" name="petugas_id" value="{{ Auth::id() }}">
                <small class="form-text text-muted">Petugas akan otomatis diisi dengan akun yang sedang login.</small>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('distribusi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection