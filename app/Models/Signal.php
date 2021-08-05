<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{

    public function signal()
    {
        return $this->morphTo();
    }

    use HasFactory;
}
