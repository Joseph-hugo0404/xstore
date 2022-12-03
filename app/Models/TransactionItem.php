<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id','item_id','priced_at','quantity'];

    public function transaction() {
        return $this->belongsTo('App\Models\Transaction');
    }

    public function item() {
        return $this->belongsTo('App\Models\Item');
    }
}
