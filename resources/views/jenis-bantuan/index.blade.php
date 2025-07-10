@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Jenis Bantuan</h1>
        <a href="{{ route('jenis-bantuan.create') }}" class="btn btn-primary">Tambah Jenis Bantuan</a>
    </div>

    @if($jenisBantuans->isEmpty())
        <div class="alert alert-info" role="alert">
            Belum ada data jenis bantuan.
        </div>
    @else
        <div class="table-responsive data-table-container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bantuan</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jenisBantuans as $jenisBantuan)
                    <tr>
                        <td>{{ $loop->iteration + ($jenisBantuans->currentPage() - 1) * $jenisBantuans->perPage() }}</td>
                        <td>{{ $jenisBantuan->nama_bantuan }}</td>
                        <td>{{ $jenisBantuan->deskripsi ?? '-' }}</td>
                        <td>
                            <a href="{{ route('jenis-bantuan.show', $jenisBantuan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('jenis-bantuan.edit', $jenisBantuan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('jenis-bantuan.destroy', $jenisBantuan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $jenisBantuans->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection