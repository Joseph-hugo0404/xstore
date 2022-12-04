<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //list 100 recent transactions
    public function index() {
        $recents = Transaction::orderBy('created_at','DESC')->get();

        return response()->json([
            'recent'=> $recents
        ]);
    }

    public function show(Transaction $transaction) {
        $transaction->load('transactionItems');
        return response()->json($transaction);
    }

    public function store(Request $request) {
        $request->validate([
            'customer_id' => 'numeric|required',
            'invoice_no' => 'string|required',
        ]);

        $transaction = Transaction::create($request->all());

        foreach($request->items as $item) {
            $item['transaction_id'] = $transaction->id;
            TransactionItem::create($item);
        }

        return response()->json($transaction);
    }

    public function update(Transaction $transaction, Request $request) {
        $transaction->update($request->all());
        return response()->json($transaction);
    }

    public function addItem(Transaction $transaction, Request $request) {
        $item = TransactionItem::create([
            'transaction_id' => $transaction->id,
            'item_id' => $request->item_id,
            'priced_at' => $request->priced_at,
            'quantity' => $request->quantity
        ]);

        return response()->json($item);
    }

    public function addItems(Transaction $transaction, Request $request) {
        foreach($request->items as $item) {
            $item->transaction_id = $transaction->id;
            TransactionItem::create($item);
        }
    }
}
