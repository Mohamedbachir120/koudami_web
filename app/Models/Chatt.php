<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class Chatt extends Model
{
    use HasFactory;
    public function sender(){
        return $this->belongsTo(User::class,'sender_id');

    }
    public function receiver(){
        return $this->belongsTo(User::class,'receiver_id');

    }
}
