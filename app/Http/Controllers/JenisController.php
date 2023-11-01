<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index(){
        $jenis = Jenis::all();
        return view('admin.jenis', ['jenis'=>$jenis]);
    }

    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $image = $request->file('foto');
		$image->storeAs('public/jenis', $image->hashName());

        $jenis = Jenis::create([
            'nama' 		=> $request['nama'],
            'deskripsi' => $request['deskripsi'],
            'foto'		=> $image->hashName(),
            'harga' 	=> $request['harga']
        ]);
        // $jenis = Jenis::create($request->all());

        if($jenis){
            return redirect('jenis');
        } else {
            return redirect('jenis/create');
        }

    }

    public function show($id){

    }

    public function edit($id){
        $jenis = Jenis::findOrFail($id);
        if($jenis == true){
            return view('admin.edit', ['jenis'=>$jenis]);
        }
    }

    public function update(Request $request, $id){
        $jenis = Jenis::where('jenis.id_jenis','=',$id)->first();
        if($request->foto){
            $image = $request->file('foto');
		    $image->storeAs('public/jenis', $image->hashName());
            $foto = $image->hashName();
        } else {
            $foto = $jenis->foto;
        }

        $jenis = Jenis::where('id_jenis', $id)->update([
            'nama' 		=> $request['nama'],
            'deskripsi' => $request['deskripsi'],
            'foto'		=> $foto,
            'harga' 	=> $request['harga']
        ]);

        if($jenis){
            return redirect('jenis');
        } else {
            return redirect('jenis/edit');
        }
    }

    public function destroy($id){
        $jenis = Jenis::find($id);
        $jenis->delete();

        return redirect('jenis');

    }
}
