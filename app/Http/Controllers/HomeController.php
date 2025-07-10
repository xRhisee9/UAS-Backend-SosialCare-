<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\JenisBantuan;
use App\Models\Pengajuan;
use App\Models\Distribusi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalWarga = Warga::count();
        $totalJenisBantuan = JenisBantuan::count();
        $totalPengajuan = Pengajuan::count();
        $totalDistribusi = Distribusi::count();
        $pengajuanMenunggu = Pengajuan::where('status', 'menunggu')->count();
        $pengajuanDisetujui = Pengajuan::where('status', 'disetujui')->count();
        $pengajuanDitolak = Pengajuan::where('status', 'ditolak')->count();

        return view('dashboard', compact(
            'totalWarga',
            'totalJenisBantuan',
            'totalPengajuan',
            'totalDistribusi',
            'pengajuanMenunggu',
            'pengajuanDisetujui',
            'pengajuanDitolak'
        ));
    }
}