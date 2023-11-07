<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    //jika nama table berbeda
    protected $table = "mahasiswa";

    //untuk mengatur kolom yang boleh diisi saat mass assignment
    protected $fillable = ['npm' ,'nama' ,'tempat_lahir','tanggal_lahir'] ;

    //untuk mengatur kolom yang tidak boleh diisi
    protected $guarded = [];

    //menghubungkan tabel mahasiswa dengan tabel prodi
    //nama method singular tanpa tambahan 's' karena one to one relationship
    public function prodi(){
        return $this->belongTo('App\Models\Prodi');
    }
}
