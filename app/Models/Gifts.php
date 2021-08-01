<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gifts extends Model
{
    use HasFactory;
    protected $guarded = ['nama'];

    public function data()
    {
        return $this->belongsTo('App\Models\Data');
    }
}