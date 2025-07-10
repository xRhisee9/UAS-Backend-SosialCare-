<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DistribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distribusis = Distribusi::with(['pengajuan.warga', 'pengajuan.jenisBantuan', 'petugas'])->paginate(10);
        return view('distribusi.index', compact('distribusis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengatasi error "Unknown column 'distribusis.pengajuan_id'"
        // Dengan menggunakan subquery yang lebih eksplisit untuk mengambil ID pengajuan yang sudah didistribusikan
        // Kemudian menggunakan whereNotIn untuk mengecualikannya.
        $distributedPengajuanIds = Distribusi::pluck('pengajuan_id')->toArray();

        $pengajuans = Pengajuan::whereNotIn('id', $distributedPengajuanIds)
                                ->with(['warga', 'jenisBantuan'])
                                ->get();

        $petugas = User::where('role', 'petugas')->orWhere('role', 'admin')->get();
        return view('distribusi.create', compact('pengajuans', 'petugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pengajuan_id' => 'required|exists:pengajuans,id|unique:distribusis',
            'tanggal_distribusi' => 'required|date',
        ]);

        $data = $request->all();
        $data['petugas_id'] = Auth::id();

        Distribusi::create($data);

        // Update status pengajuan menjadi 'disetujui' setelah didistribusikan
        $pengajuan = Pengajuan::find($request->pengajuan_id);
        if ($pengajuan) {
            $pengajuan->status = 'disetujui';
            $pengajuan->save();
        }

        return redirect()->route('distribusi.index')->with('success', 'Distribusi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Distribusi $distribusi)
    {
        $distribusi->load(['pengajuan.warga', 'pengajuan.jenisBantuan', 'petugas']);
        return view('distribusi.show', compact('distribusi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distribusi $distribusi)
    {
        $pengajuans = Pengajuan::with(['warga', 'jenisBantuan'])->get();
        $petugas = User::where('role', 'petugas')->orWhere('role', 'admin')->get();
        return view('distribusi.edit', compact('distribusi', 'pengajuans', 'petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distribusi $distribusi)
    {
        $request->validate([
            'pengajuan_id' => 'required|exists:pengajuans,id|unique:distribusis,pengajuan_id,' . $distribusi->id,
            'tanggal_distribusi' => 'required|date',
        ]);

        $data = $request->all();
        $data['petugas_id'] = Auth::id();

        $distribusi->update($data);

        return redirect()->route('distribusi.index')->with('success', 'Distribusi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distribusi $distribusi)
    {
        // Ubah status pengajuan kembali jika distribusi dihapus
        $pengajuan = Pengajuan::find($distribusi->pengajuan_id);
        if ($pengajuan && $pengajuan->status === 'disetujui') {
            $pengajuan->status = 'menunggu';
            $pengajuan->save();
        }

        $distribusi->delete();

        return redirect()->route('distribusi.index')->with('success', 'Distribusi berhasil dihapus.');
    }
}