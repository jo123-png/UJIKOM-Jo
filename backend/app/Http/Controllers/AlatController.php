<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        return response()->json(Alat::with('kategori')->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_alat' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'status_kondisi' => 'required|string',
        ]);

        $alat = Alat::create($request->all());

        return response()->json([
            'message' => 'Data alat berhasil ditambahkan',
            'data' => $alat
        ], 201);
    }

    public function show($id)
    {
        $alat = Alat::with('kategori')->find($id);
        if (!$alat) {
            return response()->json(['message' => 'Alat tidak ditemukan'], 404);
        }
        return response()->json($alat, 200);
    }

    public function update(Request $request, $id)
    {
        $alat = Alat::find($id);
        if (!$alat) {
            return response()->json(['message' => 'Alat tidak ditemukan'], 404);
        }

        $request->validate([
            'kategori_id' => 'exists:kategori,id',
            'stok' => 'integer|min:0',
        ]);

        $alat->update($request->all());

        return response()->json([
            'message' => 'Data alat berhasil diubah',
            'data' => $alat
        ], 200);
    }

    public function destroy($id)
    {
        $alat = Alat::find($id);
        if (!$alat) {
            return response()->json(['message' => 'Alat tidak ditemukan'], 404);
        }

        $alat->delete();

        return response()->json(['message' => 'Data alat berhasil dihapus'], 200);
    }
}