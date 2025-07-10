@extends('layouts.public')

@section('content')
<div class="container mt-5 pt-5">
    <h1 class="mb-4 text-center">Informasi Program Bantuan</h1>
    <p class="text-center lead">Berikut adalah daftar jenis bantuan sosial yang mungkin tersedia. Informasi detail mengenai syarat dan ketentuan dapat bervariasi.</p>

    @if($jenisBantuans->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            Belum ada jenis program bantuan yang tersedia saat ini.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-4">
            @foreach($jenisBantuans as $jenisBantuan)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $jenisBantuan->nama_bantuan }}</h5>
                        <p class="card-text">{{ $jenisBantuan->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <a href="{{ route('ajukan.bantuan.form') }}" class="btn btn-outline-primary btn-sm">Ajukan Sekarang</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    <div class="text-center mt-5">
        <p>Ingin mengajukan bantuan? Klik tombol di bawah ini:</p>
        <a href="{{ route('ajukan.bantuan.form') }}" class="btn btn-lg btn-success">Ajukan Bantuan</a>
    </div>
</div>
@endsection