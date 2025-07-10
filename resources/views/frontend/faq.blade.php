@extends('layouts.public')

@section('content')
<div class="container mt-5 pt-5">
    <h1 class="mb-4 text-center">Pertanyaan yang Sering Diajukan (FAQ)</h1>
    <p class="text-center lead">Temukan jawaban atas pertanyaan umum seputar SosialCare dan program bantuan.</p>

    <div class="accordion accordion-flush mt-5" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Bagaimana cara mengajukan bantuan?
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Anda dapat mengajukan bantuan melalui halaman "Ajukan Bantuan" di situs ini. Isi formulir dengan lengkap dan benar, lalu kirimkan. Pastikan NIK Anda belum terdaftar sebelumnya.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Apa saja jenis bantuan yang tersedia?
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Jenis bantuan yang tersedia dapat Anda lihat di halaman "Informasi Program Bantuan". Kami menyediakan bantuan sembako, bantuan tunai, kesehatan, pendidikan, dan lainnya sesuai kebutuhan.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Bagaimana saya tahu status pengajuan saya?
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Saat ini, Anda akan menerima pemberitahuan melalui email atau telepon jika pengajuan Anda disetujui atau ditolak. Tim kami sedang mengembangkan fitur pengecekan status secara online.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Apakah data saya aman di aplikasi ini?
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Ya, kami sangat menjaga keamanan data Anda. Aplikasi ini dibangun dengan framework Laravel yang memiliki fitur keamanan yang kuat, serta menerapkan validasi untuk memastikan integritas data.
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <p>Tidak menemukan jawaban yang Anda cari? <a href="{{ route('kontak') }}">Hubungi kami</a> secara langsung.</p>
    </div>
</div>
@endsection