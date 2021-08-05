<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Moldes\User;
class Rating extends Model
{
    use HasFactory;

    public function rater(){
        return $this->belongsTo(User::class,'rater_id');

    }
    
    public function rated_by(){
        return $this->belongsTo(User::class,'rated_id');

    }

}
