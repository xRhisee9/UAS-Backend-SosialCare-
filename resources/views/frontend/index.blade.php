@extends('layouts.public')

@section('content')
<div class="container-fluid p-0">
    <!-- Banner Section -->
    <div class="jumbotron jumbotron-fluid text-center py-5 animated fadeIn">
        <div class="container">
            <h1 class="display-4 animated fadeInUp animated-delay-1">Selamat Datang di SosialCare</h1>
            <p class="lead animated fadeInUp animated-delay-2">Platform untuk memudahkan pengelolaan dan pengajuan bantuan sosial.</p>
            <hr class="my-4 animated fadeInUp animated-delay-3">
            <p class="animated fadeInUp animated-delay-4">Bersama, kita wujudkan kepedulian sosial yang lebih baik.</p>
            <a class="btn btn-primary btn-lg mt-3 animated fadeInUp animated-delay-5" href="{{ route('ajukan.bantuan.form') }}" role="button">Ajukan Bantuan Sekarang!</a>
        </div>
    </div>

    <!-- Informasi Program Singkat -->
    <section class="container my-5">
        <h2 class="text-center mb-4 animated fadeIn">Bagaimana SosialCare Membantu?</h2>
        <div class="row text-center mt-4">
            <div class="col-md-4 mb-4 animated fadeInUp animated-delay-1">
                <div class="card h-100 shadow-sm-custom">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Pengajuan Mudah</h5>
                        <p class="card-text">Warga dapat mengajukan bantuan secara online dengan cepat dan mudah.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 animated fadeInUp animated-delay-2">
                <div class="card h-100 shadow-sm-custom">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Transparansi Data</h5>
                        <p class="card-text">Data penerima, jenis, dan status bantuan tercatat dengan rapi dan transparan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 animated fadeInUp animated-delay-3">
                <div class="card h-100 shadow-sm-custom">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Distribusi Efisien</h5>
                        <p class="card-text">Memudahkan instansi terkait dalam mengelola dan mendistribusikan bantuan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-primary text-white text-center py-5 animated fadeIn">
        <div class="container">
            <h3 class="animated fadeInUp animated-delay-1">Punya Pertanyaan?</h3>
            <p class="lead animated fadeInUp animated-delay-2">Jangan ragu untuk menghubungi kami atau lihat FAQ kami.</p>
            <div class="mt-4 animated fadeInUp animated-delay-3">
                <a class="btn btn-light btn-lg me-2" href="{{ route('kontak') }}" role="button">Hubungi Kami</a>
                <a class="btn btn-outline-light btn-lg" href="{{ route('faq') }}" role="button">Baca FAQ</a>
            </div>
        </div>
    </section>
</div>
@endsection