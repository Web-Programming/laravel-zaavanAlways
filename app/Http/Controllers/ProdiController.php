<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Prodi;

class ProdiController extends Controller
{
    //
    public function index(){
        $kampus = "Universitas Multi Data Palembang";
        return view ('prodi.index')->with('kampus',$kampus);
    }
    public function allJoinFacade(){
        $kampus = "Universitas Multi Data Palembang";
        $_result = DB::select('select mahasiswas.*, prodis.nama as nama_prodi from prodis, mahasiswas
        where prodis.id = mahasiswas.prodi_id');
        return view('prodi.index',['allmahasiswaprodi'=> $_result, 'kampus' =>$kampus]);
    }
    public function allJoinElq(){
        $prodis = Prodi::with('mahasiswas')->get();
        foreach($prodis as $prodi){
            echo "<h3>{$prodi->nama}</h3>";
            echo "<hr>Mahasiswa: ";
            foreach($prodi->mahasiswas as $mhs){
                echo $mhs -> nama. ", ";
            }
        }
        echo "<hr>";
    }
    public function create(){
        return view ("prodi.create");
    }
    public function store(Request $request){
        // dump($request);
        
        $this -> authorize('create',Prodi::class);

        // echo $request->nama;
        $validateData= $request->validate([
            'nama' =>'required|min:5|max:20',
            'foto' =>'required|file|image|max:5000',
            'file_lain'=>'required|file|mimes:pdf,png|max:5000',
        ]);
        //ambil ekstensi file 
        $ext = $request->foto->getClientOriginalExtension();
        //rename nama file
        $name_file = 'foto-' .time(). "." . $ext;
        $path = $request->foto->storeAs('public', $name_file);

        $prodis = new Prodi(); // buat object prodi
        $prodis ->nama = $validateData['nama']; // Simpan nilai input ($validateDate['nama']) ke dalam property nama prodis ($prodi->nama)
        $prodis ->foto=$name_file;
        $prodis ->save(); //simpan ke dalam tabel prodis

        $request->session()->flash('info', "Data Prodi $prodis->nama berhasil  disimpan ke database");
        return  redirect() -> route('prodi.create');
        // dump($validateData);
        // echo $validateData['nama'];
       

    }
}
