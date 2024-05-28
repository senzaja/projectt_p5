<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class industri extends Model
{
    use HasFactory;
    protected $fillable = ['nama_industri','alamat','tahun_kerjasama','id_jurusan'];
    protected $visible = ['nama_industri','alamat','tahun_kerjasama','id_jurusan'];
  public function jurusan()
  {
    return $this->belongsTo(jurusan::class,'id_jurusan');
  }
}
