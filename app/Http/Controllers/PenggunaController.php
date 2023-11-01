<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Sampah;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
        $jenis = Jenis::all();
        $sampah = Sampah::leftJoin('jenis', 'jenis.id_jenis', 'sampahs.jenis_sampah')
        ->select('sampahs.*', 'nama')
        ->get();
        return view('pengguna.dashboard', ['jenis'=>$jenis, 'sampah'=>$sampah]);
    }

    public function index()
    {
        $sampah = Sampah::leftJoin('jenis', 'jenis.id_jenis', 'sampahs.jenis_sampah')
        ->select('sampahs.*', 'nama')
        ->get();
        return view('pengguna.index_kalkulator', ['sampah'=>$sampah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Jenis::all();
        return view('pengguna.create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'berat' => 'required|numeric|min:0'
        ];

        $text = [
            'berat' => 'Masukkan angka positif'
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()){
            // return response()->json(['success' => 0, 'text' => $validasi->errors()->first()], 422);
            return redirect()->back()->with('error', $validasi->errors()->first());
        } else {
            $sampah = Sampah::create($request->all());
            if($sampah){
                return redirect('pengguna');
            } else {
                return redirect('pengguna/create');
            }
        }
        // $berat = $_POST['berat'];

        // if (!is_numeric($berat) || $berat <= 0) {
        // return redirect()->back()->with('alert',"Jumlah kilogram harus berupa angka positif.");
        // } else {
            
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
