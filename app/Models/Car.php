<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['pemesanan'];

    public function pemesanan(){
        return $this->hasOne(Pemesanan::class);
    }
}
