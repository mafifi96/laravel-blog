<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Sessions extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'session_id';

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
