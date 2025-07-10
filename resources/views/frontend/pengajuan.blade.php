@extends('layouts.public')

@section('content')
<div class="container mt-5 pt-5">
    <h1 class="mb-4 text-center">Formulir Pengajuan Bantuan</h1>
    <p class="text-center lead">Isi formulir di bawah ini dengan lengkap dan benar untuk mengajukan bantuan sosial.</p>

    <div class="card shadow-lg p-4 mb-5 bg-white rounded">
        <div class="card-body">
            <form id="formPengajuanBantuan" action="{{ route('ajukan.bantuan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                    <input type="text" class="form-control" id="nik" name="nik" required minlength="16" maxlength="16">
                    <small class="form-text text-muted">Pastikan NIK Anda 16 digit dan benar.</small>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor Telepon (Opsional)</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" maxlength="15">
                </div>
                <div class="mb-3">
                    <label for="jenis_bantuan_id" class="form-label">Jenis Bantuan yang Diajukan</label>
                    <select class="form-select" id="jenis_bantuan_id" name="jenis_bantuan_id" required>
                        <option value="">Pilih Jenis Bantuan</option>
                        @foreach($jenisBantuans as $jenisBantuan)
                            <option value="{{ $jenisBantuan->id }}">{{ $jenisBantuan->nama_bantuan }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Kirim Pengajuan</button>
            </form>
        </div>
    </div>
</div>
@endsection