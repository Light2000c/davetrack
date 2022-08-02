<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'transact_code',
        'status',
        'amount',
        'product_count',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transactionComplete(){
    return $this->status == 'complete';
    }
}
