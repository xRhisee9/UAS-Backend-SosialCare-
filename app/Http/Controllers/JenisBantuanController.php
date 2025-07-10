<?php

namespace App\Http\Controllers;

use App\Models\JenisBantuan;
use Illuminate\Http\Request;

class JenisBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisBantuans = JenisBantuan::paginate(10);
        return view('jenis-bantuan.index', compact('jenisBantuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis-bantuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bantuan' => 'required|string|max:255|unique:jenis_bantuans',
            'deskripsi' => 'nullable|string',
        ]);

        JenisBantuan::create($request->all());

        return redirect()->route('jenis-bantuan.index')->with('success', 'Jenis bantuan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisBantuan $jenisBantuan)
    {
        return view('jenis-bantuan.show', compact('jenisBantuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisBantuan $jenisBantuan)
    {
        return view('jenis-bantuan.edit', compact('jenisBantuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisBantuan $jenisBantuan)
    {
        $request->validate([
            'nama_bantuan' => 'required|string|max:255|unique:jenis_bantuans,nama_bantuan,' . $jenisBantuan->id,
            'deskripsi' => 'nullable|string',
        ]);

        $jenisBantuan->update($request->all());

        return redirect()->route('jenis-bantuan.index')->with('success', 'Jenis bantuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisBantuan $jenisBantuan)
    {
        $jenisBantuan->delete();

        return redirect()->route('jenis-bantuan.index')->with('success', 'Jenis bantuan berhasil dihapus.');
    }
}