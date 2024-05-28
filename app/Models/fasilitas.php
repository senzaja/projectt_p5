<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitas extends Model
{
    use HasFactory;
    protected $fillable = ['nama_fasilitas','image'];
    protected $visibble = ['nama_fasilitas','image'];
}

