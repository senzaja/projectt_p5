<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;
    protected $fillable = ['judul','deskripsi','tanggal','image'];
    protected $visibble = ['judul','deskripsi','tanggal','image'];
}
