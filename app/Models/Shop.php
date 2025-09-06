<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongTo(Owner::class);
    }
}
