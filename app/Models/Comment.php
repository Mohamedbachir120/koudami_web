<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
 
    function poster(){

        return $this->belongsTo(User::class,'poster_id');

    }

    public function signals()
    {
        return $this->morphMany('App\Models\Signal', 'signal');
    }

    function owner(){

        return $this->belongsTo(User::class,'owner_id');


    }
}
