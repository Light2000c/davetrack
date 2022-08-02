<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'country',
        'address1',
        'address2',
        'landmark',
        'phone',
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }
}
