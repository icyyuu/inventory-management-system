<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->orderBy('name')->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        Item::create($validated);

        return redirect()
            ->route('items.index')
            ->with('success', 'Item created successfully.');
    }

    public function show(string $id)
    {
        return redirect()->route('items.index');
    }

    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::orderBy('name')->get();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $item = Item::findOrFail($id);
        $item->update($validated);

        return redirect()
            ->route('items.index')
            ->with('success', 'Item updated successfully.');
    }

    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()
            ->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }
}
