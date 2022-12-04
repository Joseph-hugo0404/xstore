<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        return response()->json([
            'items' => Item::orderBy('name')->get()
        ]);
    }

    public function show(Item $item) {
        $item->load('transactionItems');
        return response()->json($item);
    }

    public function update(Item $item, Request $request) {
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy(Item $item) {
        $item->delete();
        return response()->json(['message'=>'Item has been deleted.']);
    }

    public function store(Request $request) {
        $request->validate([
            'barcode' => 'string|required',
            'name' => 'string|required',
            'description' => 'string|required',
            'units' => 'string|required',
            'price' => 'numeric|required',
            'quantity' => 'numeric|required',
        ]);

        $item = Item::create($request->all());
        return response()->json($item);
    }

}
