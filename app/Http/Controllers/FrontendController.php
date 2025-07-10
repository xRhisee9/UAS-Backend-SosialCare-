<?php

namespace App\Http\Controllers;

use App\Models\JenisBantuan;
use App\Models\Pengajuan;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Untuk transaksi database

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function program()
    {
        $jenisBantuans = JenisBantuan::all();
        return view('frontend.program', compact('jenisBantuans'));
    }

    public function kontak()
    {
        return view('frontend.kontak');
    }

    public function faq()
    {
        return view('frontend.faq');
    }

    public function storePengajuan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:wargas,nik|max:16|min:16',
            'alamat' => 'required|string',
            'no_hp' => 'nullable|string|max:15',
            'jenis_bantuan_id' => 'required|exists:jenis_bantuans,id',
        ], [
            'nik.unique' => 'NIK ini sudah terdaftar. Silakan hubungi admin jika Anda sudah pernah mengajukan.'
        ]);

        DB::beginTransaction();
        try {
            // Cek apakah warga sudah ada
            $warga = Warga::firstOrCreate(
                ['nik' => $request->nik],
                [
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                ]
            );

            // Jika warga baru dibuat atau sudah ada, cek apakah ada pengajuan aktif
            $existingPengajuan = Pengajuan::where('warga_id', $warga->id)
                                          ->whereIn('status', ['menunggu', 'disetujui'])
                                          ->first();

            if ($existingPengajuan) {
                DB::rollBack();
                return response()->json(['message' => 'Anda sudah memiliki pengajuan yang sedang diproses atau telah disetujui.'], 409);
            }

            // Buat pengajuan baru
            Pengajuan::create([
                'warga_id' => $warga->id,
                'jenis_bantuan_id' => $request->jenis_bantuan_id,
                'tanggal_pengajuan' => now()->toDateString(),
                'status' => 'menunggu',
            ]);

            DB::commit();
            return response()->json(['message' => 'Pengajuan bantuan berhasil dikirim!']);

        } catch (\Exception $e) {
            DB::rollBack();
            // Log the error for debugging
            // Log::error('Error during pengajuan: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan pengajuan. Silakan coba lagi.'], 500);
        }
    }
}