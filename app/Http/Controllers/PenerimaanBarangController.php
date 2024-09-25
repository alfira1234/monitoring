<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\PenerimaanBarang;

class PenerimaanBarangController extends Controller
{
    public function index()
    {
        $penerimaan = PenerimaanBarang::all();
        return response()->json($penerimaan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer',
            'jumlah_brg' => 'required',
            'tgl_terima' => 'required',

        ]);

        $penerimaan = PenerimaanBarang::create($request->all());

        // Update stock in items table
        $item = Item::find($request->item_id);
        if ($item) {
            $item->stock += $request->jumlah_brg;
            $item->save();
        }

        return response()->json($penerimaan, 201);
    }

    public function show($id)
    {
        $penerimaan = PenerimaanBarang::find($id);
        if ($penerimaan) {
            return response()->json($penerimaan);
        }
        return response()->json(['message' => 'penerimaan not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $penerimaan = PenerimaanBarang::find($id);
        if ($penerimaan) {
            $penerimaan->update($request->all());
            return response()->json($penerimaan);
        }
        return response()->json(['message' => 'penerimaan not found'], 404);
    }

    public function destroy($id)
    {
        $penerimaan = PenerimaanBarang::find($id);
        if ($penerimaan) {
            $penerimaan->delete();
            return response()->json(['message' => 'penerimaan deleted']);
        }
        return response()->json(['message' => 'penerimaan not found'], 404);
    }
}
