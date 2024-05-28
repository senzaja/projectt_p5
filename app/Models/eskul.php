<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eskul extends Model
{
    use HasFactory;
    protected $fillable = ['eskul','deskripsi','image'];
    protected $visibble = ['eskul','deskripsi','image'];
}
