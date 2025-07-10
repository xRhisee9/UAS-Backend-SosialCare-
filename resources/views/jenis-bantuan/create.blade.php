@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Tambah Jenis Bantuan</h1>

    <div class="card shadow-sm p-4">
        <form action="{{ route('jenis-bantuan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_bantuan" class="form-label">Nama Bantuan</label>
                <input type="text" class="form-control @error('nama_bantuan') is-invalid @enderror" id="nama_bantuan" name="nama_bantuan" value="{{ old('nama_bantuan') }}" required>
                @error('nama_bantuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi (Opsional)</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('jenis-bantuan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection