<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Warga;
use App\Models\JenisBantuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuans = Pengajuan::with(['warga', 'jenisBantuan'])->paginate(10);
        return view('pengajuan.index', compact('pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     * (Hanya untuk keperluan backend jika ingin admin/petugas membuat pengajuan,
     * tapi di konsep ini pengajuan dari frontend publik)
     */
    public function create()
    {
        // Metode ini mungkin tidak digunakan jika pengajuan hanya dari frontend
        $wargas = Warga::all();
        $jenisBantuans = JenisBantuan::all();
        return view('pengajuan.create', compact('wargas', 'jenisBantuans'));
    }

    /**
     * Store a newly created resource in storage.
     * (Hanya untuk keperluan backend jika ingin admin/petugas membuat pengajuan)
     */
    public function store(Request $request)
    {
        // Metode ini mungkin tidak digunakan jika pengajuan hanya dari frontend
        $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'jenis_bantuan_id' => 'required|exists:jenis_bantuans,id',
            'tanggal_pengajuan' => 'required|date',
            'status' => 'required|in:menunggu,disetujui,ditolak',
        ]);

        Pengajuan::create($request->all());

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {
        $pengajuan->load(['warga', 'jenisBantuan']);
        return view('pengajuan.show', compact('pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        $wargas = Warga::all();
        $jenisBantuans = JenisBantuan::all();
        return view('pengajuan.edit', compact('pengajuan', 'wargas', 'jenisBantuans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'jenis_bantuan_id' => 'required|exists:jenis_bantuans,id',
            'tanggal_pengajuan' => 'required|date',
            'status' => 'required|in:menunggu,disetujui,ditolak',
        ]);

        $pengajuan->update($request->all());

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        $pengajuan->delete();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dihapus.');
    }
}