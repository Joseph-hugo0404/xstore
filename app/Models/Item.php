<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['barcode', 'name','description','price','quantity','units'];

    public function transactionItems() {
        return $this->hasMany('App\Models\TransactionItem')
                ->orderBy('created_at','DESC');
    }

}
