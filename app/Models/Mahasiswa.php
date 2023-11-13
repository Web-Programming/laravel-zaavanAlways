<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{   
    public function prodi(){
    return $this->belongsTo('App\Models\Prodi');
    }
    use HasFactory;
}
