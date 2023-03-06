<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->query('cari');
        $dataproduk = Produk::all();

        if(!empty($cari)){
            $dataproduk = Produk::where('nama',request()->input('cari'))->get();
            return view('produk.produk')->with([
                'products' => $dataproduk,
                'cari' => $cari,
            ]);
        } else {
            $dataproduk = Produk::all();
            return view('produk.produk')->with([
                'products' => $dataproduk,
                'cari' => $cari,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pilih_komponen = DB::table('stocks')->pluck('components_name');
        $komponen_value = DB::table('stocks')->pluck('components_value');
        $komponen = Stock::all();

        return view('produk.create', [
            'komponen' => $komponen
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:produks',
            'harga' => 'required',
            'harga_member' => 'nullable'
        ]);

        Produk::create($validatedData);

        $users = User::all();
        $idBaru = Produk::latest('id')->first();
        
        foreach($users as $user) {
            $produkBaru = [
                'produk_id' => $idBaru->id,
                'user_id' => $user->id,
                'jumlah_barang' => 0
            ];

            Stock::create($produkBaru);
        }

        return redirect('/produk')->with('success', 'Produk telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        if(auth()->user()->role !== 1) {
            abort(403);
        }

        Produk::destroy($produk->id);
        Stock::where('produk_id', $produk->id)->delete();

        return redirect('/produk')->with('success', 'Data telah berhasil dihapus!');
    }

    public function getProdukName(Request $request)
    {
//        dd($request->qr_code);

        // $user = User::where('qr_code', $request->qr_code)->first();

        // Auth::loginUsingId($user->id);
        Produk::create([
            'user_id' => Auth::user()->id,
            'qr_code_produk' => $request->qr_value,
            'nama' => $request->onlyProdname,
            'created_by' => $request->username,
        ]);
        // $waktu = date('H:i');
        // $absen = "Hadir $waktu";

        // $mahasiswa = Produk::where('qr_code', $request->qr_code)->first();
        // $mahasiswa->absen2 = $absen;
        // $mahasiswa->save();

        
    }

    public function getvaluekomponen(Request $request){
        // $biarkepakeaja = DB::table('stocks')->where('id', $request->id)->value('components_value');
        // echo $biarkepakeaja;
        $hasil_komponen = DB::table('stocks')->where('id', request()->input('id'))->value('components_value');
        return $hasil_komponen;
    }
}
