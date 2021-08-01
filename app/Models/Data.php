<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $guarded = ['name'];

    public function gifts()
    {
        return $this->hasMany('App\Models\Gifts');
    }
}
