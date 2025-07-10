@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Distribusi Bantuan</h1>
        <a href="{{ route('distribusi.create') }}" class="btn btn-primary">Tambah Distribusi</a>
    </div>

    @if($distribusis->isEmpty())
        <div class="alert alert-info" role="alert">
            Belum ada data distribusi bantuan.
        </div>
    @else
        <div class="table-responsive data-table-container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengajuan ID</th>
                        <th>Nama Warga</th>
                        <th>Jenis Bantuan</th>
                        <th>Tanggal Distribusi</th>
                        <th>Petugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($distribusis as $distribusi)
                    <tr>
                        <td>{{ $loop->iteration + ($distribusis->currentPage() - 1) * $distribusis->perPage() }}</td>
                        <td>{{ $distribusi->pengajuan->id }}</td>
                        <td>{{ $distribusi->pengajuan->warga->nama }}</td>
                        <td>{{ $distribusi->pengajuan->jenisBantuan->nama_bantuan }}</td>
                        <td>{{ $distribusi->tanggal_distribusi->format('d M Y') }}</td>
                        <td>{{ $distribusi->petugas->name }}</td>
                        <td>
                            <a href="{{ route('distribusi.show', $distribusi->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('distribusi.edit', $distribusi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('distribusi.destroy', $distribusi->id) }}" method="POST" class="d-inline">
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
            {{ $distribusis->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection