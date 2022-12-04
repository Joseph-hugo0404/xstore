<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','invoice_no','remarks'];

    protected $appends = ['totalAmount'];

    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }

    public function transactionItems() {
        return $this->hasMany('App\Models\TransactionItem');
    }

    public function getTotalAmountAttribute() {
        $tis = TransactionItem::where('transaction_id', $this->id)->get();
        $total = 0;
        foreach($tis as $ti) {
            $total += $ti->priced_at * $ti->quantity;
        }
        return $total;
    }
}
