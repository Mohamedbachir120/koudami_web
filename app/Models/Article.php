<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Article extends Model
{
    use HasFactory;

    public function publicateur(){

        return $this->belongsTo(User::class,'publierPar_id');
    }    

    public function signals()
    {
        return $this->morphMany('App\Models\Signal', 'signal');
    }

}
