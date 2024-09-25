<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    public function index()
    {

        $category = Category::all(); // Ambil semua  dari database
        return response()->json($category); // Kembalikan respons JSON
        // dd('Rute dukan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
        ]);

        $category = Category::create($request->all()); // Simpan  baru berdasarkan input
        return response()->json($category, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);
        if ($category) {
            return response()->json($category);
        }
        return response()->json(['message' => 'Category not found'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        // return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $category = Category::find($id);
        if ($category) {
            $category->update($request->all());
            return response()->json($category);
        }
        return response()->json(['message' => 'Category not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return response()->json(['message' => 'Category deleted']);
        }
        return response()->json(['message' => 'Category not found'], 404);
    }
}
