<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\PengeluaranBarang;
use Illuminate\Http\Request;

class PengeluaranBarangController extends Controller
{
    public function index()
    {
        $pengeluaran = PengeluaranBarang::all();
        return response()->json($pengeluaran);
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer',
            'jumlah_brg' => 'required',
            'tgl_keluar' => 'required',

        ]);

        $pengeluaran = pengeluaranBarang::create($request->all());

        // Update stock in items table
        $item = Item::find($request->item_id);
        if ($item) {
            $item->stock -= $request->jumlah_brg;
            $item->save();
        }

        return response()->json($pengeluaran, 201);
    }

    public function show($id)
    {
        $pengeluaran = pengeluaranBarang::find($id);
        if ($pengeluaran) {
            return response()->json($pengeluaran);
        }
        return response()->json(['message' => 'pengeluaran not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $pengeluaran = pengeluaranBarang::find($id);
        if ($pengeluaran) {
            $pengeluaran->update($request->all());
            return response()->json($pengeluaran);
        }
        return response()->json(['message' => 'pengeluaran not found'], 404);
    }

    public function destroy($id)
    {
        $pengeluaran = pengeluaranBarang::find($id);
        if ($pengeluaran) {
            $pengeluaran->delete();
            return response()->json(['message' => 'pengeluaran deleted']);
        }
        return response()->json(['message' => 'pengeluaran not found'], 404);
    }
}
