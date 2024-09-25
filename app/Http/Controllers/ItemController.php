<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {

        $item = Item::all(); // Ambil semua item dari database
        return response()->json($item); // Kembalikan respons JSON

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'barang' => 'required',
            'harga' => 'required',
            'stock' => 'required',

        ]);

        $item = Item::create($request->all()); // Simpan item baru berdasarkan input
        return response()->json($item, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        if ($item) {
            return response()->json($item);
        }
        return response()->json(['message' => 'Item not found'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required',
            'barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

            $item = Item::find($id);
            $item->update($request->all());
            return response()->json($item);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = item::findOrfail($id);
        $item->delete();
    }
}
