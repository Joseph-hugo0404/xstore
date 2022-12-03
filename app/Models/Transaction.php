<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['customner_id','invoice_no','remarks'];

    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }
}
