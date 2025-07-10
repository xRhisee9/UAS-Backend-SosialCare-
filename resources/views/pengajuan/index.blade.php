@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Data Pengajuan Bantuan</h1>
        {{-- Tombol Tambah tidak ada karena pengajuan dari frontend --}}
    </div>

    @if($pengajuans->isEmpty())
        <div class="alert alert-info" role="alert">
            Belum ada data pengajuan bantuan.
        </div>
    @else
        <div class="table-responsive data-table-container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Warga</th>
                        <th>NIK Warga</th>
                        <th>Jenis Bantuan</th>
                        <th>Tgl. Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengajuans as $pengajuan)
                    <tr>
                        <td>{{ $loop->iteration + ($pengajuans->currentPage() - 1) * $pengajuans->perPage() }}</td>
                        <td>{{ $pengajuan->warga->nama }}</td>
                        <td>{{ $pengajuan->warga->nik }}</td>
                        <td>{{ $pengajuan->jenisBantuan->nama_bantuan }}</td>
                        <td>{{ $pengajuan->tanggal_pengajuan->format('d M Y') }}</td>
                        <td>
                            <span class="badge
                                @if($pengajuan->status == 'menunggu') bg-warning
                                @elseif($pengajuan->status == 'disetujui') bg-success
                                @else bg-danger @endif">
                                {{ ucfirst($pengajuan->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('pengajuan.show', $pengajuan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('pengajuan.edit', $pengajuan->id) }}" class="btn btn-warning btn-sm">Edit Status</a>
                            @if(Auth::user()->is_admin())
                            <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $pengajuans->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection