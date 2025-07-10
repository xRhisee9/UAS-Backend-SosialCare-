@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Warga</h1>
        <a href="{{ route('wargas.create') }}" class="btn btn-primary">Tambah Warga</a>
    </div>

    @if($wargas->isEmpty())
        <div class="alert alert-info" role="alert">
            Belum ada data warga.
        </div>
    @else
        <div class="table-responsive data-table-container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wargas as $warga)
                    <tr>
                        <td>{{ $loop->iteration + ($wargas->currentPage() - 1) * $wargas->perPage() }}</td>
                        <td>{{ $warga->nama }}</td>
                        <td>{{ $warga->nik }}</td>
                        <td>{{ $warga->alamat }}</td>
                        <td>{{ $warga->no_hp ?? '-' }}</td>
                        <td>
                            <a href="{{ route('wargas.show', $warga->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('wargas.edit', $warga->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('wargas.destroy', $warga->id) }}" method="POST" class="d-inline">
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
            {{ $wargas->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection